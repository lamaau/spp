<?php

namespace Modules\Payment\Http\Livewire;

use Livewire\Event;
use Livewire\Component;
use Modules\Payment\Utils\Trx;
use App\Datatables\Traits\Notify;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Entities\Bill;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Payment\Entities\Payment;
use Modules\Payment\Http\Requests\PaymentRequest;

class StudentPayment extends Component
{
    use Notify;

    /** @var object get data object from controller */
    public $bills;
    public $years;
    public $students;

    /** @var string */
    public $bill = null;
    public $year = null;
    public $student = null;
    public $billResult = null;

    /** @var array|object */
    public $evens = [];
    public $payments = [];
    public $totalPayment = [];

    /** @var null|string|integer */
    public $pay;
    public $month;
    public $change;
    public $pay_date;

    /** @var boolean */
    public $paymentState = false;

    public function mount()
    {
        $this->pay_date = date('Y-m-d');
    }

    public function resetValue()
    {
        $this->pay = null;
        $this->change = null;
    }

    public function search()
    {
        $this->billResult = Bill::query()->where('id', $this->bill)->first();

        if ($this->billResult->monthly) {
            $rawQuery = 'MONTH(`payments`.`month`) as month';
            $rawQuery .= ', `users`.`name` as author_name';
            $rawQuery .= ', `payments`.`id`, `payments`.`change`, `payments`.`pay`, `payments`.`pay_date`, `payments`.`code`';

            $payments = DB::table('payments')
                ->select(DB::raw($rawQuery))
                ->where('payments.year_id', $this->year)
                ->where('payments.bill_id', $this->bill)
                ->where('payments.student_id', $this->student)
                ->leftJoin('users', 'payments.created_by', '=', 'users.id')
                ->groupBy('payments.id')
                ->orderBy('payments.month', 'asc')
                ->whereNull('deleted_at')
                ->get()
                ->toArray();

            $results = [];
            foreach ($payments as $p) {
                $results[$p->month][] = (array)$p;
            }

            $this->payments = $results;
        } else {
            $this->payments = Payment::query()
                ->where('year_id', $this->year)
                ->where('bill_id', $this->bill)
                ->where('student_id', $this->student)
                ->with('student')
                ->get();
        }
    }

    public function pay($month = null)
    {
        $this->resetValue();

        if (!is_null($month)) {
            $this->totalPayment = [];
            if (isset($this->payments[$month])) {
                foreach ($this->payments[$month] as $value) {
                    $this->totalPayment[] = $value['pay'];
                }

                $this->paymentState = ($this->billResult->nominal - array_sum($this->totalPayment)) <= 0 ? true : false;
            } else {
                $this->paymentState = false;
            }

            $this->month = create_date($month);
        } else {
            $this->month = null;
        }

        $this->emit('pay');
    }

    public function updatedPay()
    {
        $pay = clean_currency_format($this->pay);

        if (!is_null($pay) && is_numeric($pay)) {
            if ($this->billResult->monthly) {
                $totalPayments = array_sum($this->totalPayment);
            } else {
                $totalPayments = array_sum($this->payments->pluck('pay')->toArray());
            }

            $payed = $this->billResult->nominal - $totalPayments;
            if ($payed != 0 && $pay > $payed) {
                $this->change = idr($pay - $payed);
            } else {
                $this->change = 0;
            }
        } else {
            $this->change = 0;
        }
    }

    public function onPay()
    {
        $request = new PaymentRequest($this->bill, $this->year, $this->student, $this->month);
        $validated = $this->validate($request->rules(), [], $request->attributes());

        DB::beginTransaction();

        try {
            $pay = clean_currency_format($validated['pay']);

            // default change from form is `Rp xxx.xxx`
            // bellow is remove Rp and dot
            $changed = clean_currency_format(trim(substr($this->change, strpos($this->change, "Rp") + 2)));

            $payment = array_merge($validated, [
                'month' => $this->month,
                'bill_id' => $this->bill,
                'year_id' => $this->year,
                'change' => $this->change,
                'student_id' => $this->student,
                'code' => Trx::generate(Payment::class),
                'pay' => abs($pay - $changed),
            ]);

            Payment::create($payment);
            DB::commit();
            $this->resetValue();
            $this->search();
            return $this->success('Berhasil!', 'Pembayaran telah dilakukan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->error('Oops!', 'Terjadi kesalahan.');
        }
    }

    /**
     * Delete payment
     *
     * @param string $id
     * @param string $password
     * @return Event
     */
    public function delete(string $id, string $password): Event
    {
        if (Hash::check($password, Auth::user()->password)) {
            if (resolve(\Modules\Payment\Repository\PaymentRepository::class)->delete($id)) {
                $this->search();
                return $this->success('Berhasil!', 'Data pembayaran berhasil dihapus');
            }

            return $this->error('Oopss!', 'Terjadi kesalahan');
        }

        return $this->error('', 'Password yang anda masukan salah.');
    }

    public function render()
    {
        return view('payment::livewire.payment', [
            'odd' => \Modules\Utils\Semester::odd(),
            'even' => \Modules\Utils\Semester::even(),
        ]);
    }
}

<?php

namespace Modules\Payment\Livewire;

use Livewire\Component;
use App\Datatables\Traits\Notify;
use Modules\Master\Entities\Bill;
use Illuminate\Support\Facades\DB;
use Modules\Master\Entities\Student;
use Modules\Payment\Entities\Payment;
use Modules\Master\Entities\SchoolYear;
use Modules\Payment\Http\Requests\PaymentRequest;

class StudentPayment extends Component
{
    use Notify;

    /** @var object get data object from controller */
    // public $bills;
    // public $years;
    // public $students;

    /** @var string */
    public $bill = null;
    public $year = null;
    public $student = null;
    public $billResult = null;

    /** @var array */
    public $evens = [];
    public $payments = [];

    /** @var attributes */
    public $pay;
    public $mines;
    public $month;
    public $change;
    public $pay_date;

    public function resetValue()
    {
        $this->pay = null;
        $this->mines = null;
        $this->change = null;
    }

    public function search()
    {
        $this->billResult = Bill::query()->where('id', $this->bill)->first();

        if ($this->billResult->monthly) {
            $rawQuery = 'MONTH(month) as month, `change`, `pay`, `mines`, `pay_date`';

            $payments = DB::table('payments')
                ->select(DB::raw($rawQuery))
                ->where('year_id', $this->year)
                ->where('bill_id', $this->bill)
                ->where('student_id', $this->student)
                ->groupBy('id')
                ->orderBy('month', 'asc')
                ->get()
                ->toArray();

            $results = [];
            foreach ($payments as $p) {
                $results[$p->month][] = (array)$p;
            }

            $this->payments = $results;
        }
    }

    public function updatedPay()
    {
        if (!is_null($this->pay) && is_numeric($this->pay)) {
            $result = idr((int)$this->pay - (int)$this->billResult->nominal);
            if ($this->pay < $this->billResult->nominal) {
                $this->mines = $result;
                $this->change = 0;
            } else {
                $this->mines = 0;
                $this->change = $result;
            }
        } else {
            $this->mines = 0;
            $this->change = 0;
        }
    }

    public function pay($month)
    {
        $this->month = create_date($month);
        $this->emit('pay');
    }

    public function onPay()
    {
        $request = new PaymentRequest();
        $validated = $this->validate($request->rules(), [], $request->attributes());

        $payment = array_merge($validated, [
            'year_id' => $this->year,
            'bill_id' => $this->bill,
            'student_id' => $this->student,
            'month' => $this->month,
            'mines' => $this->mines,
            'change' => $this->change,
        ]);

        Payment::create($payment);
        $this->resetValue();
        return $this->success('Berhasil!', 'Pembayaran telah dilakukan.');
    }

    public function render()
    {
        return view('payment::livewire.payment', [
            'bills' => Bill::query()->select(['id', 'name'])->get(),
            'years' => SchoolYear::query()->select(['id', 'year'])->get(),
            'students' => Student::query()->select(['id', 'name', 'nis', 'nisn'])->get(),
        ]);
    }
}

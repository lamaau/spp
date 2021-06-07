<?php

namespace Modules\Payment\Pdf;

use DOMPDF;
use Modules\Utils\Semester;
use Modules\Master\Entities\Bill;
use Illuminate\Support\Facades\DB;
use Modules\Master\Entities\Student;
use Modules\Master\Entities\SchoolYear;

class PaymentYearlyPdf
{
    protected $user;
    protected $bill;
    protected $year;
    protected $type;

    public function __construct($user, $bill, $year, $type)
    {
        $this->user = $user;
        $this->bill = $bill;
        $this->year = $year;
        $this->type = $type;
    }

    public function loadView($view)
    {
        if (is_null($this->user) || is_null($this->bill) || is_null($this->year) || is_null($this->type)) {
            notify('red', 'Gagal!', 'Data pembayaran tidak ditemukan.');
            return redirect()->route('payment.index');
        }

        $rawQuery = 'MONTH(month) as month, `id`, `change`, `pay`, `pay_date`';
        $payments = DB::table('payments')
            ->select(DB::raw($rawQuery))
            ->where('year_id', $this->year)
            ->where('bill_id', $this->bill)
            ->where('student_id', $this->user)
            ->groupBy('id')
            ->orderBy('month', 'asc')
            ->get()
            ->toArray();

        $results = [];
        foreach ($payments as $p) {
            $results[$p->month][] = $p;
        }

        $results['detail'] = [
            'year' => SchoolYear::query()->where('id', $this->year)->select('year')->first(),
            'bill' => Bill::query()->where('id', $this->bill)->select(['name', 'nominal'])->first(),
            'student' => Student::query()->where('id', $this->user)->select('id', 'name', 'room_id')->with('room')->first(),
        ];

        if (in_array($this->type, ['ganjil', 'genap'])) {
            return view($view, [
                'type' => $this->type,
                'title' => $results['detail']['student']['name'] . '-NotaYearly -' . date('Ymd-His'),
                'results' => $results,
                'semesters' => $this->type == 'ganjil' ? Semester::odd() : Semester::even(),
            ]);
        }

        notify('red', 'Gagal!', 'Data pembayaran tidak ditemukan.');
        return redirect()->route('payment.index');
    }
}

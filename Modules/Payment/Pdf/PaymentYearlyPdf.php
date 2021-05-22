<?php

namespace Modules\Payment\Pdf;

use Illuminate\Support\Facades\DB;
use Modules\Master\Entities\Bill;
use Modules\Master\Entities\SchoolYear;
use Modules\Master\Entities\Student;
use Modules\Payment\Entities\Payment;

class PaymentYearlyPdf
{
    protected $user;
    protected $bill;
    protected $year;
    protected $month;

    public function __construct($user, $bill, $year)
    {
        $this->user = $user;
        $this->bill = $bill;
        $this->year = $year;
    }

    public function loadView($view)
    {
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

        if (count($payments)) {
            return \PDF::loadView($view, [
                'results' => $results,
                'odd' => \Modules\Utils\Semester::odd(),
                'even' => \Modules\Utils\Semester::even(),
                'title' => 'NotaYearly -' . date('Ymd-His'),
            ])->setPaper('a4', 'landscape')->stream();
        }

        notify('red', 'Gagal!', 'Data tidak ditemukan.');
        return redirect()->route('payment.index');
    }
}

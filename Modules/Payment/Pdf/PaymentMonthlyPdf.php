<?php

namespace Modules\Payment\Pdf;

use Modules\Payment\Entities\Payment;

class PaymentMonthlyPdf
{
    protected $user;
    protected $bill;
    protected $year;
    protected $month;

    public function __construct($user, $bill, $month, $year)
    {
        $this->user = $user;
        $this->bill = $bill;
        $this->year = $year;
        $this->month = $month;
    }

    public function loadView($view)
    {
        $payments = Payment::query()
            ->with(['bill', 'student', 'school_year'])
            ->where('bill_id', $this->bill)
            ->where('year_id', $this->year)
            ->where('student_id', $this->user)
            ->whereMonth('month', $this->month)
            ->get();

        if (count($payments)) {
            return \PDF::loadView($view, [
                'title' => 'NotaMonthly -' . date('Ymd-His'),
                'rows' => $payments,
            ])->setPaper('a4', 'portrait')->stream();
        }

        notify('red', 'Gagal!', 'Data tidak ditemukan.');
        return redirect()->route('payment.index');
    }
}

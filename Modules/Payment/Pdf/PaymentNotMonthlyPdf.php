<?php

namespace Modules\Payment\Pdf;

use Modules\Payment\Entities\Payment;

class PaymentNotMonthlyPdf
{
    /** @var string|null */
    private $user;
    private $year;
    private $bill;

    public function __construct($user, $year, $bill)
    {
        $this->user = $user;
        $this->year = $year;
        $this->bill = $bill;
    }

    public function loadView($view)
    {
        if (is_null($this->user) || is_null($this->year) || is_null($this->bill)) {
            notify('red', 'Gagal!', 'Data pembayaran tidak ditemukan.');
            return redirect()->route('payment.index');
        }

        $payments = Payment::query()
            ->with(['bill', 'student', 'school_year'])
            ->where('bill_id', $this->bill)
            ->where('year_id', $this->year)
            ->where('student_id', $this->user)
            ->get();

        if (count($payments)) {
            return view($view, [
                'title' => $payments->first()->student->name . '-NotaNotMonthly-' . date('Ymd-His'),
                'rows' => $payments,
            ]);
        }
    }
}

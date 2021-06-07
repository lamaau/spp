<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Master\Entities\Bill;
use Illuminate\Routing\Controller;
use Modules\Master\Entities\Student;
use Modules\Master\Entities\SchoolYear;
use Modules\Payment\Pdf\PaymentYearlyPdf;
use Modules\Payment\Pdf\PaymentMonthlyPdf;
use Illuminate\Contracts\Support\Renderable;

class PaymentController extends Controller
{
    /**
     * View payment page
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('payment::payment.index', [
            'title' => 'Pembayaran',
            'bills' => Bill::query()->select(['id', 'name'])->get(),
            'years' => SchoolYear::query()->select(['id', 'year'])->get(),
            'students' => Student::query()->select(['id', 'name', 'nis', 'nisn'])->get(),
        ]);
    }

    public function printYearly(Request $request)
    {
        $user = $request->query('user');
        $bill = $request->query('bill');
        $year = $request->query('year');
        $type = $request->query('type');

        if ($user && $bill && $year && $type) {
            return (new PaymentYearlyPdf($user, $bill, $year, $type))->loadView('payment::payment.print.yearly');
        }
    }

    public function printMonthly(Request $request)
    {
        $user = $request->query('user');
        $bill = $request->query('bill');
        $year = $request->query('year');
        $month = $request->query('month');

        if ($user && $bill && $year && $month) {
            return (new PaymentMonthlyPdf($user, $bill, $month, $year))->loadView('payment::payment.print.monthly');
        }
    }

    public function printNotMonthly(Request $request)
    {
        $user = $request->query('user');
        $bill = $request->query('bill');
        $year = $request->query('year');
        $month = $request->query('month');

        if ($user && $bill && $year && $month) {
            return (new PaymentMonthlyPdf($user, $bill, $month, $year))->loadView('payment::payment.print.monthly');
        }
    }
}

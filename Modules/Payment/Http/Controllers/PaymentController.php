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
        return view('payment::index', [
            'title' => 'Kelola Pembayaran',
            'bills' => Bill::query()->select(['id', 'name'])->get(),
            'years' => SchoolYear::query()->select(['id', 'year'])->get(),
            'students' => Student::query()->select(['id', 'name', 'nis', 'nisn'])->get(),
        ]);
    }

    public function pdfMonthly(Request $request)
    {
        $user = $request->query('user');
        $bill = $request->query('bill');
        $year = $request->query('year');
        $month = $request->query('month');

        if ($user && $bill && $year && $month) {
            return (new PaymentMonthlyPdf($user, $bill, $month, $year))->loadView('payment::pdf.monthly');
        }

        notify('failed', 'Gagal!', 'Data tidak ditemukan.');
        return redirect()->route('payment.index');
    }

    public function pdfYearly(Request $request)
    {
        $user = $request->query('user');
        $bill = $request->query('bill');
        $year = $request->query('year');

        if ($user && $bill && $year) {
            return (new PaymentYearlyPdf($user, $bill, $year))->loadView('payment::pdf.yearly');
        }

        notify('red', 'Gagal!', 'Data tidak ditemukan.');
        return redirect()->route('payment.index');
    }
}

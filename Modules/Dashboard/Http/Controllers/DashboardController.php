<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Repository\BillRepository;
use Modules\Report\Repository\IncomeRepository;
use Modules\Master\Repository\StudentRepository;
use Modules\Payment\Repository\SpendingRepository;

class DashboardController extends Controller
{
    public function __invoke(
        BillRepository $bill,
        StudentRepository $student,
        IncomeRepository $income,
        SpendingRepository $spending
    ) {
        return view('dashboard::index', [
            'title' => 'Dashboard',
            'bill' => $bill->all()->count(),
            'income' => $income->income(),
            'spending' => $spending->spending(),
            'student' => $student->all()->count(),
        ]);
    }
}

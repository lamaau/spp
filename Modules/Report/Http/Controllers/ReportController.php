<?php

namespace Modules\Report\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Master\Repository\BillRepository;
use Modules\Report\Repository\IncomeRepository;

class ReportController extends Controller
{
    protected BillRepository $bill;
    protected IncomeRepository $income;

    public function __construct(
        BillRepository $bill,
        IncomeRepository $income
    ) {
        $this->bill = $bill;
        $this->income = $income;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('report::index', [
            'title' => 'Laporan'
        ]);
    }

    public function finance(): Renderable
    {
        return view('report::finance.index', [
            'title' => 'Keuangan',
            'bills' => $this->bill->all()->orderBy('payments_sum_pay', 'desc')->get(),
            'stats' => [
                'daily' => $this->income->dailyPercentage(),
                'weekly' => $this->income->weeklyPercentage(),
                'monthly' => $this->income->monthlyPercentage(),
                'yearly' => $this->income->yearlyPercentage(),
            ],
        ]);
    }
}

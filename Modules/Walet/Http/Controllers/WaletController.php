<?php

namespace Modules\Walet\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\Master\Entities\Bill;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Master\Repository\BillRepository;
use Modules\Walet\Repository\IncomeRepository;

class WaletController extends Controller
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
    public function income()
    {
        return view('walet::income.index', [
            'title' => 'Pemasukan',
            'bills' => $this->bill->all(),
            'stats' => [
                'daily' => $this->income->dailyPercentage(),
                'weekly' => $this->income->weeklyPercentage(),
                'monthly' => $this->income->monthlyPercentage(),
                'yearly' => $this->income->yearlyPercentage(),
            ],
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function spending()
    {
        return view('walet::spending.index', [
            'title' => 'Pengeluaran'
        ]);
    }
}

<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Master\Repository\BillRepository;

class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return Renderable
     */
    public function index(BillRepository $bill): Renderable
    {
        return view('payment::spending.index', [
            'title' => 'Pengeluaran',
            'bills' => $bill->all()->get()->toArray(),
        ]);
    }
}

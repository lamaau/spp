<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('payment::spending.index', [
            'title' => 'Pengeluaran'
        ]);
    }
}

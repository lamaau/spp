<?php

namespace Modules\Report\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ReportController extends Controller
{
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
            'title' => 'Keuangan'
        ]);
    }
}

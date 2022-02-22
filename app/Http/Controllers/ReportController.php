<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return inertia('report/index')->title(__('Laporan'));
    }
}

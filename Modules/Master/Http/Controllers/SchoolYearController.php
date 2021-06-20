<?php

namespace Modules\Master\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class SchoolYearController extends Controller
{
    
    public function index(): Renderable
    {
        return view('master::school-year.index', ['title' => 'Daftar Tahun Ajaran']);
    }
}

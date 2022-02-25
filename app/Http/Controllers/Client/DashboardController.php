<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {        
        return inertia('client/dashboard')->title(__('Dasbor'));
    }
}

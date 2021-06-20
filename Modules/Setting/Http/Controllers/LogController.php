<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LogController extends Controller
{
    public function activity()
    {
        return view('setting::activity.index', [
            'title' => 'Kelola Log Aktifitas'
        ]);
    }
}

<?php

namespace Modules\Dashboard\Http\Controllers;

use Modules\Master\Entities\Room;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard::index', [
            'title' => 'Dashboard',
            'rooms' => Room::query()->get()
        ]);
    }
}

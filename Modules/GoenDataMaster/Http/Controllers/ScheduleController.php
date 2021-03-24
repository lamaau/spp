<?php

namespace Modules\GoenDataMaster\Http\Controllers;

use Illuminate\Routing\Controller;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedule.index', [
            'title' => 'Atur jadwal ujian',
        ]);
    }
}

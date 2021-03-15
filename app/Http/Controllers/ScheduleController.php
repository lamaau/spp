<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedule.index', [
            'title' => 'Atur jadwal ujian'
        ]);
    }
}

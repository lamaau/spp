<?php

namespace Modules\GoenDataMaster\Http\Controllers;

use Illuminate\Routing\Controller;

class LevelController extends Controller
{
    public function __invoke()
    {
        return view('goendatamaster::level.index', ['title' => 'Kelola Level Kelas']);
    }
}

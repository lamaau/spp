<?php

namespace Modules\GoenDataMaster\Http\Controllers;

use Illuminate\Routing\Controller;

class RoomController extends Controller
{
    public function __invoke()
    {
        return view('room.index', ['title' => 'Kelola Kelas']);
    }
}

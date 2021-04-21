<?php

namespace Modules\Master\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class RoomController extends Controller
{
    public function index(): Renderable
    {
        return view('master::room.index', ['title' => 'Daftar Kelas']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\RoomRequest;
use App\Repository\Eloquent\RoomEloquent;

class RoomController extends Controller
{
    protected $room;

    public function __construct(RoomEloquent $room)
    {
        $this->room = $room;
    }

    public function index()
    {
        return view('room.index', ['title' => 'Kelola Kelas']);
    }

    public function store(RoomRequest $request)
    {
        if ($this->room->save($request->data())) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil menambah data kelas',
            ], Response::HTTP_OK);
        }
    }
}

<?php

namespace Modules\GoenDataMaster\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller;
use Modules\GoenDataMaster\Http\Requests\RoomRequest;
use Modules\GoenDataMaster\Repository\RoomRepository;

class RoomJsonController extends Controller
{
    protected $room;

    public function __construct(RoomRepository $room)
    {
        $this->room = $room;
    }

    public function rooms(Request $request): LengthAwarePaginator
    {
        return $this->room->all($request);
    }

    public function store(RoomRequest $request)
    {
        return response()->json($request->data(), 200);
    }
}

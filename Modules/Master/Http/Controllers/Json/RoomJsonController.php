<?php

namespace Modules\Master\Http\Controllers\Json;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Master\Repository\RoomRepository;

class RoomJsonController extends Controller
{
    /** @var RoomRepository */
    protected $room;

    public function __construct(RoomRepository $room)
    {
        $this->room = $room;
    }

    public function all(): JsonResponse
    {
        return response()->json(['data' => $this->room->all()], 200);
    }
}

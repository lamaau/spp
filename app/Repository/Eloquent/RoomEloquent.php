<?php

namespace App\Repository\Eloquent;

use App\Models\Room;
use App\Repository\RoomRepository;

class RoomEloquent implements RoomRepository
{
    protected $room;

    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    public function save(array $request)
    {
        return $this->room->create($request) ? true : false;
    }
}

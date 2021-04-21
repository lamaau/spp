<?php

namespace Modules\Master\Repository\Eloquent;

use Illuminate\Http\JsonResponse;
use Modules\Master\Entities\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Repository\RoomRepository;

class RoomEloquent implements RoomRepository
{
    /** @var Room */
    protected $room;

    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    public function all()
    {
        return $this->room->all();
    }

    public function save(array $request): bool
    {
        return $this->room->create($request) ? true : false;
    }

    public function delete(string $id): bool
    {
        $room = $this->room->findOrFail($id);
        return $room->delete() ? true : false;
    }
}

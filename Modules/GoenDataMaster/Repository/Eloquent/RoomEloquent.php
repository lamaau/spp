<?php

namespace Modules\GoenDataMaster\Repository\Eloquent;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\GoenDataMaster\Entities\Room;
use Modules\GoenDataMaster\Repository\RoomRepository;

class RoomEloquent implements RoomRepository
{
    protected $room;

    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    public function all(object $request): LengthAwarePaginator
    {
        return $this->room->orderBy($request->sortby, $request->sortbykey)->when($request->keyword, function ($query) use ($request) {
            $query->whereLike(['name', 'code', 'description'], $request->keyword);
        })->paginate($request->query('per_page') ?? 10);
    }

    public function save(array $request): bool
    {
        return $this->room->create($request) ? true : false;
    }
}

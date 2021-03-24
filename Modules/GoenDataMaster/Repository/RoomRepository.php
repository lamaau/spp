<?php

namespace Modules\GoenDataMaster\Repository;

use Illuminate\Pagination\LengthAwarePaginator;

if (!interface_exists('RoomRepository')) {
    interface RoomRepository
    {
        public function all(object $request): LengthAwarePaginator;

        public function save(array $request): bool;
    }
}

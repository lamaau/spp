<?php

namespace App\Repository;

if (!interface_exists('RoomRepository')) {
    interface RoomRepository
    {
        public function save(array $request);
    }
}

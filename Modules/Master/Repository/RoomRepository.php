<?php

namespace Modules\Master\Repository;

use Illuminate\Http\JsonResponse;

if (!interface_exists('RoomRepository')) {
    interface RoomRepository
    {
        /**
         * Get all room
         *
         * @return JsonResponse
         */
        public function all();
        
        /**
         * Save room
         *
         * @param array $request
         * @return boolean
         */
        public function save(array $request): bool;
        
        /**
         * Remove room
         *
         * @return boolean
         */
        public function delete(string $id): bool;
    }
}

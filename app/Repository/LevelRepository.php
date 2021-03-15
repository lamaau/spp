<?php

namespace App\Repository;

use Illuminate\Pagination\LengthAwarePaginator;

if (!interface_exists('LevelRepository')) {
    interface LevelRepository
    {
        /**
         * Display level
         *
         * @param object $request
         * @return LengthAwarePaginator
         */
        public function all(object $request): LengthAwarePaginator;

        /**
         * Save level
         *
         * @param array $request
         * @return boolean
         */
        public function save(array $request): bool;

        /**
         * Edit level
         *
         * @param string $id
         * @return object
         */
        public function edit(string $id): object;

        /**
         * Update level
         *
         * @param string $id
         * @param array  $request
         * @return bool
         */
        public function update(string $id, array $request): bool;
    }
}

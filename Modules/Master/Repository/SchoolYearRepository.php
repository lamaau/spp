<?php

namespace Modules\Master\Repository;

if (!interface_exists('SchoolYearRepository')) {
    interface SchoolYearRepository
    {
        /**
         * Select school year
         *
         * @return void
         */
        public function select(): object;

        /**
         * Save school year
         *
         * @param array $request
         * @return boolean
         */
        public function save(array $request): bool;

        /**
         * Remove school year
         *
         * @return boolean
         */
        public function delete(string $id): bool;
    }
}

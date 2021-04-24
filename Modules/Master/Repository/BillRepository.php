<?php

namespace Modules\Master\Repository;

if (!interface_exists('BillRepository')) {
    interface BillRepository
    {
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

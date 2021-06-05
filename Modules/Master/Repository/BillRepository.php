<?php

namespace Modules\Master\Repository;

if (!interface_exists('BillRepository')) {
    interface BillRepository
    {
        /**
         * Get all bill
         *
         * @return null|object
         */
        public function all();

        /**
         * Get bill where id
         *
         * @param string $id
         * @return object
         */
        public function whereId(string $id): object;

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

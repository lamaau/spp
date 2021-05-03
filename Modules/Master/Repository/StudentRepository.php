<?php

namespace Modules\Master\Repository;

if (!interface_exists('StudentRepository')) {
    interface StudentRepository
    {
        /**
         * Find student
         *
         * @param string $id
         * @return null|object
         */
        public function findOrFail(string $id);

        /**
         * Save student
         *
         * @param array $request
         * @return boolean
         */
        public function save(array $request): bool;

        /**
         * Update student
         *
         * @param array $request
         * @return boolean
         */
        public function update(string $id, array $request): bool;
        
        /**
         * Delete student
         *
         * @param string $id
         * @return boolean
         */
        public function delete(string $id): bool;
    }
}

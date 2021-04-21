<?php

namespace Modules\Master\Repository;

if (!interface_exists('StudentRepository')) {
    interface StudentRepository
    {
        /**
         * Save student
         *
         * @param array $request
         * @return boolean
         */
        public function save(array $request): bool;
    }
}
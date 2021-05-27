<?php

namespace Modules\Walet\Repository;

if (!interface_exists('SpendingRepository')) {
    interface SpendingRepository
    {
        /**
         * Get all payment
         *
         * @return null|object
         */
        public function all(): ?object;

        /**
         * Count income
         *
         * @return integer
         */
        public function spending(): int;

        /**
         * Save spending
         *
         * @param array $request
         * @return boolean
         */
        public function save(array $request): bool;
    }
}

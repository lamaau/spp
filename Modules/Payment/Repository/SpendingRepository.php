<?php

namespace Modules\Payment\Repository;

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
         * Get total spending
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

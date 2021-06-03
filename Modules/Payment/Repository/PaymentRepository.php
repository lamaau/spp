<?php

namespace Modules\Payment\Repository;

if (!interface_exists('PaymentRepository')) {
    interface PaymentRepository
    {
        /**
         * Get all payment
         *
         * @return null|object
         */
        public function all();

        /**
         * Delete payment
         *
         * @param string $id
         * @return boolean
         */
        public function delete(string $id): bool;
    }
}

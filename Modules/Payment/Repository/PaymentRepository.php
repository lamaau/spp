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
         * Sum payment where bill
         *
         * @param string $id
         * @return int|null
         */
        public function sumPayment(string $id): ?int;

        /**
         * Delete payment
         *
         * @param string $id
         * @return boolean
         */
        public function delete(string $id): bool;
    }
}

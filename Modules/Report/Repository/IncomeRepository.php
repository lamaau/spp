<?php

namespace Modules\Report\Repository;

if (!interface_exists('IncomeRepository')) {
    interface IncomeRepository
    {
        /**
         * Get all income with sum pay for one bill
         *
         * @return integer
         */
        public function income(): int;

        /**
         * Get total income where given bill
         *
         * @param string $id bill id
         * @return object|null
         */
        public function incomeWhereBill(string $id): ?object;

        /**
         * Get total spending where given bill
         *
         * @param string $id
         * @return object|null
         */
        public function spendingWhereBill(string $id): ?object;

        /**
         * Get daily percentage
         *
         * @return array
         */
        public function dailyPercentage(): array;

        /**
         * Get weekly percentage
         *
         * @return array
         */
        public function weeklyPercentage(): array;

        /**
         * Get monthly percentage
         *
         * @return array
         */
        public function monthlyPercentage(): array;

        /**
         * Get yearly percentage
         *
         * @return array
         */
        public function yearlyPercentage(): array;
    }
}

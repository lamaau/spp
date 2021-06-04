<?php

namespace Modules\Walet\Repository;

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

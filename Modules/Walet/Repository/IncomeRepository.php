<?php

namespace Modules\Walet\Repository;

if (!interface_exists('IncomeRepository')) {
    interface IncomeRepository
    {
        /**
         * Count income
         *
         * @return integer
         */
        public function income(): int;
    }
}

<?php

namespace Modules\Setting\Repository;

if (!interface_exists('GeneralRepository'))
{
    interface GeneralRepository
    {
        /**
         * Get general setting
         *
         * @return object
         */
        public function first(): object;

        
        /**
         * Create general setting
         *
         * @return boolean
         */
        public function save(array $request): bool;
    }
}

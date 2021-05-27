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
    }
}

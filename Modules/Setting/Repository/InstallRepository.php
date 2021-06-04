<?php

namespace Modules\Setting\Repository;

if (!interface_exists('InstallRepository'))
{
    interface InstallRepository
    {
        /**
         * Setup application
         *
         * @param array $request
         * @return boolean
         */
        public function setup(array $request): bool;

        /**
         * Get setting
         *
         * @return object
         */
        public function first(): ?object;
    }
}

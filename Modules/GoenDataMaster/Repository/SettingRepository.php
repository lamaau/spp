<?php

namespace Modules\GoenDataMaster\Repository;

use Illuminate\Database\Eloquent\Collection;

if (!interface_exists('SettingRepository')) {
    interface SettingRepository
    {
        /**
         * Get the setting
         *
         * @return object
         */
        public function first(): object;

        /**
         * Get the paid plans
         *
         * @return Collection
         */
        public function paid(): Collection;

        /**
         * Get the unpaid plans
         *
         * @return Collection
         */
        public function unpaid(): Collection;

        /**
         * Save the setting
         *
         * @param  array  $request
         * @return bool
         */
        public function save(array $request): bool;
    }
}

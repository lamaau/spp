<?php

namespace Modules\Setting\Repository;

if (!interface_exists('SettingRepository')) {
    interface SettingRepository
    {
        /**
         * General setting
         * 
         * @return null|object
         */
        public function general(): ?object;

        /**
         * Mail configuration
         *
         * @return object|null
         */
        public function mailConfiguration(): ?object;

        /**
         * Pusher configuration
         *
         * @return object|null
         */
        public function pusherConfiguration(): ?object;

        /**
         * Save or update
         * 
         * @param string table name
         * @param array request
         * @return boolean
         */
        public function saveOrUpdate(string $table, array $request): bool;
    }
}

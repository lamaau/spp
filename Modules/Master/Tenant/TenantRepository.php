<?php

namespace Modules\Master\Tenant;

if (!interface_exists('TenantRepository')) {
    interface TenantRepository
    {
        const ATTRIBUTE_NAME = 'tenant_id';

        /**
         * Get tenant column
         *
         * @return string
         */
        public function getTenantId();
    }
}

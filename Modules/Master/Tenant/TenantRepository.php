<?php

namespace Modules\Master\Tenant;

if (!interface_exists('TenantRepository')) {
    interface TenantRepository
    {
        const ATTRIBUTE_NAME = 'tenant_id';

        /**
         * Get tenant colunm
         *
         * @return string
         */
        public function getTenantId();
    }
}

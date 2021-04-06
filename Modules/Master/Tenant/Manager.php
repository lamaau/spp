<?php

namespace Modules\Master\Tenant;

class Manager
{
    /** @var object */
    protected $tenant;

    /**
     * Set tenant
     *
     * @param string $tenant
     * @return void
     */
    public function setTenant($tenant): void
    {
        $this->tenant = $tenant;
    }

    /**
     * Get tenant
     *
     * @return void
     */
    public function getTenant()
    {
        return $this->tenant;
    }
}

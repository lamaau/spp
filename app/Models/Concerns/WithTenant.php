<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use App\Models\Scopes\SchoolScope;

/**
 * WithTenant
 */
trait WithTenant
{
    /**
     * Booting with tenant
     *
     * @return void
     */
    public static function bootWithTenant()
    {
        static::addGlobalScope(new SchoolScope());
    }

    /**
     * Is tenantable
     *
     * @return boolean
     */
    public function isTenantable(): bool
    {
        $tenantable = $this->tenantable ?: true;

        return ($tenantable === true) && in_array('school_id', $this->getFillable());
    }

    /**
     * Is not tenantable
     *
     * @return boolean
     */
    public function isNotTenantable(): bool
    {
        return !$this->isTenantable();
    }
}

<?php

namespace Modules\Master\Tenant\Traits;

use Modules\Master\Tenant\Manager;
use Modules\Master\Tenant\Scopes\TenantScope;

trait ForTenants
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new TenantScope(app(Manager::class)->getTenant()));
    }
}

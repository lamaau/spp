<?php

namespace Modules\Master\Tenant\Traits;

use RuntimeException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Modules\Master\Tenant\TenantRepository;
use Modules\Master\Tenant\Scopes\TenantScope;

trait ForTenants
{
    public static function booted()
    {
        $authUser = auth()->user()->tenant_id ?? null;
        static::addGlobalScope(new TenantScope($authUser));

        static::creating(function (Model $model) {
            $model->applyTenant();
        });
    }

    /**
     * Sets tenant id column with current tenant
     *
     * @throws TenantException
     */
    public function applyTenant()
    {
        $user = Auth::user();

        $tenantId = $this->getAttribute(TenantRepository::ATTRIBUTE_NAME);

        if (!$tenantId) {
            if ($user instanceof TenantRepository) {
                $this->setAttribute(TenantRepository::ATTRIBUTE_NAME, $user->getTenantId());
            } else {
                throw new RuntimeException("Current user must implement Tenant interface");
            }
        }
    }

    /**
     * Remove a registered Tenant global scope.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function withoutTenant()
    {
        return static::withoutGlobalScope(TenantScope::class);
    }
}

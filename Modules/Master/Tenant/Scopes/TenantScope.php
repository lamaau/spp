<?php

namespace Modules\Master\Tenant\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{
    private $tenant;

    public function __construct(string $tenant)
    {
        $this->tenant = $tenant;
    }

    public function apply(Builder $builder, Model $model)
    {
        return $builder->where('tenant_id', $this->tenant);
    }
}

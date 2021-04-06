<?php

namespace Modules\Master\Tenant\Scopes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Modules\Master\Tenant\TenantRepository;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $user = Auth::user();

        if ($user instanceof TenantRepository) {
            $builder->where($model->qualifyColumn(TenantRepository::ATTRIBUTE_NAME), $user->getTenantId());
        }
    }
}

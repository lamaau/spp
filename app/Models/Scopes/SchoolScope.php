<?php

declare(strict_types=1);

namespace App\Models\Scopes;

use App\Models\Concerns\WithScope;
use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class SchoolScope implements Scope
{
    use WithScope;

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (method_exists($this, 'isNotTenantable') && $this->isNotTenantable()) {
            return;
        }

        $table = $model->getTable();

        // Skip for specific tables
        $skip_tables = [
            'jobs', 'firewall_ips', 'firewall_logs', 'migrations', 'notifications', 'role_companies',
            'role_permissions', 'sessions', 'user_companies', 'user_dashboards', 'user_permissions', 'user_roles',
        ];

        if (in_array($table, $skip_tables)) {
            return;
        }


        if ($this->scopeExists($builder, 'school_id')) {
            return;
        }

        // what do you think about make current on this place?
        if (!app()->has(School::class)) {
            School::find(request()->route('school'))->makeCurrent();
        }

        $builder->where("$table.school_id", school()->id);
    }
}

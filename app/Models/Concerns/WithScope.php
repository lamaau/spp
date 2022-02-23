<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;

/**
 * With Scopes
 */
trait WithScope
{
    /**
     * Check if scope already exists
     *
     * @param Builder $builder
     * @param string $column
     * @return boolean
     */
    public function scopeExists(Builder $builder, string $column): bool
    {
        $query = $builder->getQuery();

        foreach ((array) $query->wheres as $where) {
            if (empty($where) || empty($where['column'])) {
                continue;
            }

            if (strstr($where['column'], '.')) {
                $whr = explode('.', $where['column']);

                $where['column'] = $whr[1];
            }

            if ($where['column'] != $column) {
                continue;
            }

            return true;
        }

        return false;
    }
}

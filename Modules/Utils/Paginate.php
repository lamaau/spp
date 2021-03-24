<?php

namespace Modules\Utils;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class Paginate
{
    /**
     * The attributes that are mass assignable.
     * This method for make pagination from Builder
     *
     * @param array|object $items
     * @param integer $perPage
     * @param null|string $page
     * @param array $options
     * 
     * @return LengthAwarePaginator
     */
    public static function set($items, $perPage = 10, $page = null, $options = [])
    {
        $page  = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
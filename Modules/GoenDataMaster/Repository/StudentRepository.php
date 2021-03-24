<?php

namespace Modules\GoenDataMaster\Repository;

use Illuminate\Pagination\LengthAwarePaginator;

if (!interface_exists('StudentRepository')) {
    interface StudentRepository
    {
        public function all(object $request): LengthAwarePaginator;
    }
}

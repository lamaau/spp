<?php

namespace Modules\Master\Repository\Eloquent;

use Modules\Master\Entities\SchoolYear;
use Modules\Master\Repository\SchoolYearRepository;

class SchoolYearEloquent implements SchoolYearRepository
{
    /** @var Room */
    protected $school_year;

    public function __construct(SchoolYear $school_year)
    {
        $this->school_year = $school_year;
    }

    public function select(): object
    {
        return $this->school_year->query()->select(['id', 'year'])->get();
    }

    public function save(array $request): bool
    {
        return $this->school_year->create($request) ? true : false;
    }

    public function delete(string $id): bool
    {
        $school_year = $this->school_year->findOrFail($id);

        return $school_year->delete() ? true : false;
    }
}

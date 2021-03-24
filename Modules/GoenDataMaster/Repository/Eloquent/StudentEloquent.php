<?php

namespace Modules\GoenDataMaster\Repository\Eloquent;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\GoenDataMaster\Entities\Student;
use Modules\GoenDataMaster\Repository\StudentRepository;

class StudentEloquent implements StudentRepository
{
    protected $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    /**
     * Get all students
     *
     * @param object $request
     * @return void
     */
    public function all(object $request): LengthAwarePaginator
    {
        return $this->student->orderBy($request->sortby, $request->sortbykey)->when($request->keyword, function ($query) use ($request) {
            $query->whereLike(['name'], $request->keyword);
        })->paginate($request->query('per_page') ?? 10);
    }
}

<?php

namespace App\Repository\Eloquent;

use App\Models\Student;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repository\StudentRepository;

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

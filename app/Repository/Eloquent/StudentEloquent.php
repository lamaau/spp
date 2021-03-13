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
        return $this->student->orderBy($request->sortby, $request->sortbykey)->when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->paginate($request->query('per_page') ?? 10);
    }
}

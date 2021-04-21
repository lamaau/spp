<?php

namespace Modules\Master\Repository\Eloquent;

use Modules\Master\Entities\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Entities\Student;
use Modules\Master\Repository\StudentRepository;

class StudentEloquent implements StudentRepository
{
    /** @var Student */
    protected $student;

    public function __construct(Student $student, Room $room)
    {
        $this->student = $student;
    }

    /**
     * Save student
     *
     * @param array $request
     * @return boolean
     */
    public function save(array $request): bool
    {
        return $this->student->create($request) ? true : false;
    }
}

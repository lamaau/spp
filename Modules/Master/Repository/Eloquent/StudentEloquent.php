<?php

namespace Modules\Master\Repository\Eloquent;

use Modules\Master\Entities\Room;
use Modules\Master\Entities\Student;
use Modules\Master\Constants\StudentConstant;
use Modules\Master\Repository\StudentRepository;

class StudentEloquent implements StudentRepository
{
    /** @var Student */
    protected $student;

    public function __construct(Student $student, Room $room)
    {
        $this->student = $student;
    }

    public function findOrFail(string $id)
    {
        return $this->student->findOrFail($id);
    }

    /**
     * Save student
     *
     * @param array $request
     * @return boolean
     */
    public function save(array $request): bool
    {
        $request['status'] = StudentConstant::ACTIVE;
        return $this->student->create($request) ? true : false;
    }

    public function update(string $id, array $request): bool
    {
        $student = $this->findOrFail($id);
        if ($student) {
            return $student->update($request) ? true : false;
        }

        return false;
    }

    /**
     * Delete student
     *
     * @param string $id
     * @return boolean
     */
    public function delete(string $id): bool
    {
        return $this->student->where('id', $id)->first()->delete() ? true : false;
    }
}

<?php

namespace Modules\Master\Repository\Eloquent;

use Illuminate\Support\Facades\DB;
use Modules\Master\Entities\Student;
use Modules\Master\Constants\StudentConstant;
use Modules\Master\Repository\StudentRepository;

class StudentEloquent implements StudentRepository
{
    /** @var Student */
    protected $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    /**
     * Get all student
     *
     * @return void
     */
    public function all()
    {
        return $this->student->all();
    }

    public function groupByStatusCount()
    {
        $query = DB::table('students')->selectRaw('COUNT(`id`) as total, status, MONTH(`created_at`) as month')->whereNull('deleted_at')->groupBy('status')->get()->toArray();

        $tmp = [];
        foreach ($query as $k => $item) {
            $tmp[$item->status]['total'] = $item->total;
            $tmp[$item->status]['month'] = $item->month;
        }
        
        $result = [];
        foreach (StudentConstant::labels() as $key => $value) {
            $any = isset($tmp[$key]);
            $result[] = [
                'total' => $any ? $tmp[$key]['total'] : 0,
                'status' => $value,
                'status_key' => $key,
                'type' => StudentConstant::types()[$key],
                'month' => $tmp[$key]['month'] ?? 0
            ];
        }
        
        return $result;
    }

    /**
     * Find student
     *
     * @param string $id
     * @return null|object
     */
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
        return $this->student->create($request) ? true : false;
    }

    /**
     * Update student
     *
     * @param string $id
     * @param array $request
     * @return boolean
     */
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

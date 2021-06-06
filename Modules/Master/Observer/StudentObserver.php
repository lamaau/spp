<?php

namespace Modules\Master\Observer;

use Illuminate\Support\Facades\Auth;
use Modules\Master\Constants\StudentConstant;
use Modules\Master\Entities\Student;

class StudentObserver
{
    public function creating(Student $model)
    {
        $model->fill([
            'created_by' => Auth::id(),
            'status' => StudentConstant::ACTIVE,
        ]);
    }

    public function updating(Student $model)
    {
        $model->fill([
            'updated_by' => Auth::id(),
        ]);
    }

    public function deleting(Student $model)
    {
        if (property_exists($model, 'unique') && is_array($model->unique)) {
            foreach ($model->unique as $key) {
                $tmp[$key] = uniqid() . "::" . $model->{$key};
            }

            $result = array_merge($tmp, [
                'deleted_by' => Auth::id(),
            ]);

            $model->update($result);
        }
    }
}

<?php

namespace Modules\Master\Observer;

use Illuminate\Support\Facades\Auth;
use Modules\Master\Entities\Student;

class StudentObserver
{
    public function creating(Student $model)
    {
        $model->fill([
            'created_by' => Auth::id(),
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
        $model->fill([
            'deleted_by' => Auth::id(),
        ]);
    }
}

<?php

namespace Modules\Master\Observer;

use App\Entities\Activity;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Entities\Student;
use Modules\Master\Constants\StudentConstant;

class StudentObserver
{
    public function creating(Student $model)
    {
        $model->fill([
            'created_by' => Auth::id(),
            'status' => StudentConstant::ACTIVE,
        ]);

        Activity::record("Tambah Siswa", ['original' => $model]);
    }

    public function updating(Student $model)
    {
        $model->fill([
            'updated_by' => Auth::id(),
        ]);
        
        Activity::record("Ubah Siswa", Activity::parse($model->getDirty(), $model->getOriginal()));
    }

    public function deleting(Student $model)
    {
        Activity::record("Hapus Siswa", ['original' => $model->fill(['deleted_by' => Auth::id()])]);
        
        if (property_exists($model, 'unique') && is_array($model->unique)) {
            foreach ($model->unique as $key) {
                $tmp[$key] = uniqid() . "::" . $model->{$key};
            }

            $result = array_merge($tmp, [
                'deleted_by' => Auth::id(),
            ]);

            $model->withoutEvents(function() use ($model, $result) {
                $model->update($result);
            });
        }
    }
}

<?php

namespace Modules\Master\Observer;

use App\Entities\Activity;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Entities\SchoolYear;

class SchoolYearObserver
{
    public function creating(SchoolYear $model)
    {
        $model->fill([
            'created_by' => Auth::id(),
        ]);

        Activity::record("Tambah Tahun Ajaran", ['original' => $model]);
    }

    public function updating(SchoolYear $model)
    {
        $model->fill([
            'updated_by' => Auth::id(),
        ]);

        Activity::record("Ubah Tahun Ajaran", Activity::parse($model->getDirty(), $model->getOriginal()));
    }

    public function deleting(SchoolYear $model)
    {
        Activity::record("Hapus Tahun Ajaran", ['original' => $model->fill(['deleted_by' => Auth::id()])]);

        if (property_exists($model, 'unique') && is_array($model->unique)) {
            foreach ($model->unique as $key) {
                $tmp[$key] = uniqid() . "::" . $model->{$key};
            }

            $result = array_merge($tmp, [
                'deleted_by' => Auth::id(),
            ]);

            $model->withoutEvents(function () use ($model, $result) {
                $model->update($result);
            });
        }

        /** delete all related payment */
        if ($model->payments->isNotEmpty()) {
            $model->payments()->each(function ($query) {
                $query->delete();
            });
        }
    }
}

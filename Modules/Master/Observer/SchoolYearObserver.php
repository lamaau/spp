<?php

namespace Modules\Master\Observer;

use Illuminate\Support\Facades\Auth;
use Modules\Master\Entities\SchoolYear;

class SchoolYearObserver
{
    public function creating(SchoolYear $model)
    {
        $model->fill([
            'created_by' => Auth::id(),
        ]);
    }

    public function updating(SchoolYear $model)
    {
        $model->fill([
            'updated_by' => Auth::id(),
        ]);
    }

    public function deleting(SchoolYear $model)
    {
        if (property_exists(SchoolYear::class, 'unique') && is_array($model->unique)) {
            foreach ($model->unique as $key) {
                $tmp[$key] = uniqid() . "-" . $model->{$key};
            }

            $result = array_merge($tmp, [
                'deleted_by' => Auth::id(),
            ]);

            $model->update($result);
        }

        /** delete all related payment */
        if ($model->payments->isNotEmpty()) {
            $model->payments()->each(function ($query) {
                $query->delete();
            });
        }
    }
}

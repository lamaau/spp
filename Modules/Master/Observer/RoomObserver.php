<?php

namespace Modules\Master\Observer;

use App\Entities\Activity;
use Modules\Master\Entities\Room;
use Illuminate\Support\Facades\Auth;

class RoomObserver
{
    public function creating(Room $model)
    {
        $model->fill([
            'created_by' => Auth::id(),
        ]);

        Activity::record("Tambah Kelas", ['original' => $model]);
    }

    public function updating(Room $model)
    {
        $model->fill([
            'updated_by' => Auth::id(),
        ]);

        Activity::record("Ubah Kelas", Activity::parse($model->getDirty(), $model->getOriginal()));
    }

    public function deleting(Room $model)
    {
        Activity::record("Hapus Kelas", ['original' => $model->fill(['deleted_by' => Auth::id()])]);

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

        /** delete all related student */
        if ($model->students->isNotEmpty()) {
            $model->students()->each(function ($query) {
                $query->delete();
            });
        }
    }
}

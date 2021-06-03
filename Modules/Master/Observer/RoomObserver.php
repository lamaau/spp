<?php

namespace Modules\Master\Observer;

use Illuminate\Support\Facades\Auth;
use Modules\Master\Entities\Room;

class RoomObserver
{
    public function creating(Room $model)
    {
        $model->fill([
            'created_by' => Auth::id(),
        ]);
    }

    public function updating(Room $model)
    {
        $model->fill([
            'updated_by' => Auth::id(),
        ]);
    }

    public function deleting(Room $model)
    {
        if (property_exists(Room::class, 'unique') && is_array($model->unique)) {
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

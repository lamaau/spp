<?php

namespace Modules\Master\Observer;

use Illuminate\Support\Facades\Auth;
use Modules\Master\Entities\Bill;

class BillObserver
{
    public function creating(Bill $model)
    {
        $model->fill([
            'created_by' => Auth::id(),
        ]);
    }

    public function updating(Bill $model)
    {
        $model->fill([
            'updated_by' => Auth::id(),
        ]);
    }

    public function deleting(Bill $model)
    {
        $model->update([
            'deleted_by' => Auth::id(),
        ]);

        /** delete all related payments  */
        if ($model->payments->isNotEmpty()) {
            $model->payments()->each(function ($query) {
                $query->delete();
            });
        }
    }
}

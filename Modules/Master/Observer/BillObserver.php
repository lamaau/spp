<?php

namespace Modules\Master\Observer;

use App\Entities\Activity;
use Modules\Master\Entities\Bill;
use Illuminate\Support\Facades\Auth;

class BillObserver
{
    public function creating(Bill $model)
    {
        $model->fill([
            'created_by' => Auth::id(),
        ]);

        Activity::record("Tambah Tagihan", ['original' => $model]);
    }

    public function updating(Bill $model)
    {
        $model->fill([
            'updated_by' => Auth::id(),
        ]);

        Activity::record("Ubah Tagihan", Activity::parse($model->getDirty(), $model->getOriginal()));
    }

    public function deleting(Bill $model)
    {
        Activity::record("Hapus Tagihan", ['original' => $model->fill(['deleted_by' => Auth::id()])]);

        $model->withoutEvents(function () use ($model) {
            $model->update([
                'deleted_by' => Auth::id(),
            ]);
        });

        /** delete all related payments  */
        if ($model->payments->isNotEmpty()) {
            $model->payments()->each(function ($query) {
                $query->delete();
            });
        }

        /** delete al related spendings */
        if ($model->spendings->isNotEmpty()) {
            $model->spendings()->each(function ($query) {
                $query->delete();
            });
        }
    }
}

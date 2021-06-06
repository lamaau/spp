<?php

namespace Modules\Payment\Observer;

use Illuminate\Support\Facades\Auth;
use Modules\Payment\Entities\Spending;

class SpendingObserver
{
    public function creating(Spending $model)
    {
        $model->fill([
            'created_by' => Auth::id(),
        ]);
    }

    public function updating(Spending $model)
    {
        $model->fill([
            'updated_by' => Auth::id(),
        ]);
    }

    public function deleting(Spending $model)
    {
        $model->update([
            'deleted_by' => Auth::id(),
        ]);
    }
}

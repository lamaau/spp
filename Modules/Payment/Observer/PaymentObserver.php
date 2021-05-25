<?php

namespace Modules\Payment\Observer;

use Illuminate\Support\Facades\Auth;
use Modules\Master\Entities\User;

class PaymentObserver
{
    public function creating(User $model)
    {
        $model->fill([
            'created_by' => Auth::id(),
        ]);
    }

    public function updating(User $model)
    {
        $model->fill([
            'updated_by' => Auth::id(),
        ]);
    }

    public function deleting(User $model)
    {
        $model->fill([
            'deleted_by' => Auth::id(),
        ]);
    }
}

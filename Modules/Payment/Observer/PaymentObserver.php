<?php

namespace Modules\Payment\Observer;

use Illuminate\Support\Facades\Auth;
use Modules\Payment\Entities\Payment;

class PaymentObserver
{
    public function creating(Payment $model)
    {
        $model->fill([
            'created_by' => Auth::id(),
        ]);
    }

    public function updating(Payment $model)
    {
        $model->fill([
            'updated_by' => Auth::id(),
        ]);
    }

    public function deleting(Payment $model)
    {
        $model->update([
            'deleted_by' => Auth::id(),
        ]);
    }
}

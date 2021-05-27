<?php

namespace Modules\Walet\Observer;

use Illuminate\Support\Facades\Auth;
use Modules\Walet\Entities\Spending;

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
}

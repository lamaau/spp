<?php

namespace Modules\Master\Observer;

use Illuminate\Support\Facades\Auth;
use Modules\Master\Entities\SchoolYear;

class SchoolYearObserver
{
    public function creating(SchoolYear $setting)
    {
        $setting->fill([
            'created_by' => Auth::id(),
        ]);
    }
}

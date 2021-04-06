<?php

namespace Modules\Master\Observer;

use Illuminate\Support\Facades\Auth;
use Modules\Master\Entities\Setting;

class InstallObserver
{
    public function creating(Setting $setting)
    {
        $setting->fill([
            'created_by' => Auth::id(),
        ]);
    }
}

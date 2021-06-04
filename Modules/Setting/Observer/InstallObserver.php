<?php

namespace Modules\Setting\Observer;

use Illuminate\Support\Facades\Auth;
use Modules\Setting\Entities\Setting;

class InstallObserver
{
    public function creating(Setting $setting)
    {
        $setting->fill([
            'created_by' => Auth::id(),
        ]);
    }
}

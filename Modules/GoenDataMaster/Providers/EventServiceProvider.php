<?php

namespace Modules\GoenDataMaster\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\GoenDataMaster\Entities\Setting;
use Modules\GoenDataMaster\Observer\SettingObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        Setting::observe(SettingObserver::class);
    }
}

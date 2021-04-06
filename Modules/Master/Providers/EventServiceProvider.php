<?php

namespace Modules\Master\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Master\Entities\Setting;
use Modules\Master\Observer\InstallObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        Setting::observe(InstallObserver::class);
    }
}

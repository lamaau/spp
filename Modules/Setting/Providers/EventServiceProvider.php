<?php

namespace Modules\Setting\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        \Modules\Setting\Entities\Setting::observe(\Modules\Setting\Observer\InstallObserver::class);
    }
}

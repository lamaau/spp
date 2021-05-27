<?php

namespace Modules\Walet\Providers;

use Modules\Walet\Entities\Spending;
use Illuminate\Support\ServiceProvider;
use Modules\Walet\Observer\SpendingObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        Spending::observe(SpendingObserver::class);
    }
}

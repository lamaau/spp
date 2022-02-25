<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Models\Room::observe(\App\Observers\RoomObserver::class);
        \App\Models\Year::observe(\App\Observers\YearObserver::class);
    }
}

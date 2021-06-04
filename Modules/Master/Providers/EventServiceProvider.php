<?php

namespace Modules\Master\Providers;

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
        \Modules\Master\Entities\Room::observe(\Modules\Master\Observer\RoomObserver::class);
        \Modules\Master\Entities\Bill::observe(\Modules\Master\Observer\BillObserver::class);
        \Modules\Master\Entities\Student::observe(\Modules\Master\Observer\StudentObserver::class);
        \Modules\Master\Entities\SchoolYear::observe(\Modules\Master\Observer\SchoolYearObserver::class);
    }
}

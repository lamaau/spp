<?php

namespace Modules\Master\Providers;

use Modules\Master\Entities\Bill;
use Modules\Master\Entities\Room;
use Modules\Master\Entities\Setting;
use Illuminate\Support\ServiceProvider;
use Modules\Master\Entities\SchoolYear;
use Modules\Master\Observer\BillObserver;
use Modules\Master\Observer\RoomObserver;
use Modules\Master\Observer\InstallObserver;
use Modules\Master\Observer\SchoolYearObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        Room::observe(RoomObserver::class);
        Bill::observe(BillObserver::class);
        Setting::observe(InstallObserver::class);
        SchoolYear::observe(SchoolYearObserver::class);
    }
}

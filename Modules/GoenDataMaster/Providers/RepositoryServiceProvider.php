<?php

namespace Modules\GoenDataMaster\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            \Modules\GoenDataMaster\Repository\StudentRepository::class,
            \Modules\GoenDataMaster\Repository\Eloquent\StudentEloquent::class
        );

        $this->app->bind(
            \Modules\GoenDataMaster\Repository\RoomRepository::class,
            \Modules\GoenDataMaster\Repository\Eloquent\RoomEloquent::class
        );

        $this->app->bind(
            \Modules\GoenDataMaster\Repository\LevelRepository::class,
            \Modules\GoenDataMaster\Repository\Eloquent\LevelEloquent::class
        );

        $this->app->bind(
            \Modules\GoenDataMaster\Repository\SettingRepository::class,
            \Modules\GoenDataMaster\Repository\Eloquent\SettingEloquent::class
        );

        $this->app->bind(
            \Modules\GoenDataMaster\Repository\InvoiceRepository::class,
            \Modules\GoenDataMaster\Repository\Eloquent\InvoiceEloquent::class
        );
    }
}

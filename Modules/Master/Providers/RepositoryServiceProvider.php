<?php

namespace Modules\Master\Providers;

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
            \Modules\Master\Repository\InstallRepository::class,
            \Modules\Master\Repository\Eloquent\InstallEloquent::class
        );

        $this->app->bind(
            \Modules\Master\Repository\SchoolYearRepository::class,
            \Modules\Master\Repository\Eloquent\SchoolYearEloquent::class
        );

        $this->app->bind(
            \Modules\Master\Repository\BillRepository::class,
            \Modules\Master\Repository\Eloquent\BillEloquent::class
        );

        $this->app->bind(
            \Modules\Master\Repository\RoomRepository::class,
            \Modules\Master\Repository\Eloquent\RoomEloquent::class
        );

        $this->app->bind(
            \Modules\Master\Repository\StudentRepository::class,
            \Modules\Master\Repository\Eloquent\StudentEloquent::class
        );
    }
}

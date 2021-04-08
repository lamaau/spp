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
            \Modules\Master\Repository\RoomRepository::class,
            \Modules\Master\Repository\Eloquent\RoomEloquent::class
        );
    }
}
<?php

namespace Modules\Setting\Providers;

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
            \Modules\Setting\Repository\InstallRepository::class,
            \Modules\Setting\Repository\Eloquent\InstallEloquent::class
        );

        $this->app->bind(
            \Modules\Setting\Repository\SettingRepository::class,
            \Modules\Setting\Repository\Eloquent\SettingEloquent::class
        );
    }
}

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
            \Modules\Setting\Repository\GeneralRepository::class,
            \Modules\Setting\Repository\Eloquent\GeneralEloquent::class
        );
    }
}

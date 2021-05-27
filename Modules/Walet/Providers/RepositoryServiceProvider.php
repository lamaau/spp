<?php

namespace Modules\Walet\Providers;

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
            \Modules\Walet\Repository\SpendingRepository::class,
            \Modules\Walet\Repository\Eloquent\SpendingEloquent::class
        );

        $this->app->bind(
            \Modules\Walet\Repository\IncomeRepository::class,
            \Modules\Walet\Repository\Eloquent\IncomeEloquent::class
        );
    }
}

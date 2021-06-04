<?php

namespace Modules\Report\Providers;

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
            \Modules\Report\Repository\IncomeRepository::class,
            \Modules\Report\Repository\Eloquent\IncomeEloquent::class
        );
    }
}

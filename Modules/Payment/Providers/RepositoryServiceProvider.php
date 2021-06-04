<?php

namespace Modules\Payment\Providers;

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
            \Modules\Payment\Repository\PaymentRepository::class,
            \Modules\Payment\Repository\Eloquent\PaymentEloquent::class
        );

        $this->app->bind(
            \Modules\Payment\Repository\SpendingRepository::class,
            \Modules\Payment\Repository\Eloquent\SpendingEloquent::class
        );
    }
}

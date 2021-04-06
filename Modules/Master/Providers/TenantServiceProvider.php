<?php

namespace Modules\Master\Providers;

use Illuminate\Http\Request;
use Modules\Master\Tenant\Manager;
use Illuminate\Support\ServiceProvider;

class TenantServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Manager::class, function () {
            return new Manager();
        });

        // $this->app->singleton(TenantObserver::class, function() {
        //     return new TenantObserver(app(Manager::class)->getTenant());
        // });

        Request::macro('tenant', function () {
            return app(Manager::class)->getTenant();
        });
    }
}

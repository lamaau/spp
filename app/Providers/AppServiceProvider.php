<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(LivewireServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('layouts.pdf', 'pdf-layout');
        Blade::component('layouts.app',  'app-layout');
        Blade::component('layouts.auth', 'auth-layout');

        $this->loadViewsFrom(resource_path('views/datatables'), 'datatable');

        // Gate::before(function ($user, $ability) {
        //     if ($user->hasRole('Super Admin')) {
        //         return true;
        //     }
        // });
    }
}

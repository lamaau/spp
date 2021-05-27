<?php

namespace App\Providers;

use App\Regional\Regional;
use Illuminate\Support\ServiceProvider;

class RegionalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('regional', function () {
            return new Regional;
        });
    }
}

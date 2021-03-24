<?php

namespace Modules\GoenDataMaster\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\GoenDataMaster\Views\Composers\SettingComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.base', SettingComposer::class);
    }
}

<?php

namespace Modules\Setting\Providers;

use Illuminate\Support\Facades\View;
use Modules\Setting\Entities\Pusher;
use Illuminate\Support\ServiceProvider;
use Modules\Setting\View\Composer\SettingComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'layouts.includes.sidebar',
            'layouts.includes.pdf.cop',
            'layouts.includes.pdf.ttd',
        ], SettingComposer::class);

        if (Pusher::first()) {
            View::composer('layouts.includes.scripts', function($view) {
                $view->with('pusher', Pusher::first());
            });
        }
    }
}

<?php

namespace Modules\Setting\Providers;

use Illuminate\Support\Facades\View;
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
            'livewire.auth.login',
            'layouts.includes.sidebar',
            'layouts.includes.pdf.cop',
            'layouts.includes.pdf.ttd',
        ], SettingComposer::class);
    }
}

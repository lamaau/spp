<?php

namespace Modules\Master\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Modules\Master\View\Composer\SettingComposer;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer([
            'layouts.includes.pdf.cop',
            'layouts.includes.pdf.ttd',
        ], SettingComposer::class);
    }
}

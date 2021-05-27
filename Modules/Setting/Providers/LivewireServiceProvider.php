<?php

namespace Modules\Setting\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Modules\Setting\Livewire\GeneralSetting;

class LivewireServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Livewire::component('general-setting', GeneralSetting::class);
    }
}

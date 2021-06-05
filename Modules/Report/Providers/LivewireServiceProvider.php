<?php

namespace Modules\Report\Providers;

use Illuminate\Support\ServiceProvider;

class LivewireServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        \Livewire\Livewire::component('finance-income', \Modules\Report\Http\Livewire\Finance\Income::class);
    }
}

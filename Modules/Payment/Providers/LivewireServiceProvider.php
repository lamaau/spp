<?php

namespace Modules\Payment\Providers;

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
        \Livewire\Livewire::component('payment', \Modules\Payment\Http\Livewire\StudentPayment::class);
    }
}

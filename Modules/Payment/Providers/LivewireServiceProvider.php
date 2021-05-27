<?php

namespace Modules\Payment\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Modules\Payment\Livewire\StudentPayment;

class LivewireServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Livewire::component('payment', StudentPayment::class);
    }
}

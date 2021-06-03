<?php

namespace Modules\Master\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LivewireServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Livewire::component('student-form', \Modules\Master\Http\Livewire\Student\Form::class);
    }
}

<?php

namespace Modules\Setting\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Modules\Setting\Http\Livewire\RoleForm;
use Modules\Setting\Http\Livewire\RoleTable;

class LivewireServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Livewire::component('mail-setting', \Modules\Setting\Http\Livewire\Mail::class);
        Livewire::component('pusher-setting', \Modules\Setting\Http\Livewire\Pusher::class);
        Livewire::component('general-setting', \Modules\Setting\Http\Livewire\General::class);
        Livewire::component('role-table', RoleTable::class);
        Livewire::component('role-form', RoleForm::class);
    }
}

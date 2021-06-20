<?php

namespace Modules\Setting\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Modules\Setting\Datatables\LogDatatable;
use Modules\Setting\Http\Livewire\General;
use Modules\Setting\Http\Livewire\RoleForm;
use Modules\Setting\Http\Livewire\RoleTable;
use Modules\Setting\Datatables\OperatorDatatable;

class LivewireServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Livewire::component('role-form', RoleForm::class);
        Livewire::component('role-table', RoleTable::class);
        Livewire::component('general-setting', General::class);
        Livewire::component('operator-datatable', OperatorDatatable::class);
        // log
        Livewire::component('log-datatable', LogDatatable::class);
    }
}

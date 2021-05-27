<?php

namespace Modules\Walet\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Modules\Walet\Datatables\SpendingDatatable;

class LivewireServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Livewire::component('spending-datatable', SpendingDatatable::class);
    }
}

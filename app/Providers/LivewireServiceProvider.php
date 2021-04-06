<?php

namespace App\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Modules\Master\Datatables\RoomDatatable;

class LivewireServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /** @datatable room */
        Livewire::component('room-datatable', RoomDatatable::class);
    }
}

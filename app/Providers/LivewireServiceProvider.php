<?php

namespace App\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Modules\Master\Datatables\RoomDatatable;
use Modules\Master\Datatables\StudentDatatable;
use Modules\Master\Datatables\SchoolYearDatatable;

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
        Livewire::component('student-datatable', StudentDatatable::class);
        Livewire::component('school-year-datatable', SchoolYearDatatable::class);
    }
}

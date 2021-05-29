<?php

namespace Modules\Document\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Modules\Document\Datatables\DocumentDatatable;

class LivewireServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Livewire::component('document-datatable', DocumentDatatable::class);
    }
}

<?php

namespace Modules\Dashboard\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use Modules\Dashboard\Livewire\FinanceDashboardChart;

class LivewireServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Livewire::component('finance-dashboard-chart', FinanceDashboardChart::class);
    }
}

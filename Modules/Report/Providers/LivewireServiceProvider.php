<?php

namespace Modules\Report\Providers;

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
        \Livewire\Livewire::component('student-chart', \Modules\Report\Http\Livewire\Student\StudentChart::class);
        \Livewire\Livewire::component('export', \Modules\Report\Http\Livewire\Student\ExportStudent::class);

        \Livewire\Livewire::component('finance-income-chart', \Modules\Report\Http\Livewire\Finance\IncomeChart::class);
        \Livewire\Livewire::component('finance-spending-chart', \Modules\Report\Http\Livewire\Finance\SpendingChart::class);
    }
}

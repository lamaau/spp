<?php

namespace Modules\Payment\Providers;

use Modules\Payment\Entities\Payment;
use Modules\Payment\Entities\Spending;
use Illuminate\Support\ServiceProvider;
use Modules\Payment\Observer\PaymentObserver;
use Modules\Payment\Observer\SpendingObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        Payment::observe(PaymentObserver::class);
        Spending::observe(SpendingObserver::class);
    }
}

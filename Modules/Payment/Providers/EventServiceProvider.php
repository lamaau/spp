<?php

namespace Modules\Payment\Providers;

use Modules\Payment\Entities\Payment;
use Illuminate\Support\ServiceProvider;
use Modules\Payment\Observer\PaymentObserver;

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
    }
}

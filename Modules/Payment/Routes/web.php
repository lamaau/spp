<?php

use Illuminate\Support\Facades\Route;
use Modules\Payment\Http\Controllers\PaymentController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('payment')->as('payment.')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name('index');
        Route::get('print-yearly/{params?}', [PaymentController::class, 'printYearly'])->name('print-yearly');
    });
});

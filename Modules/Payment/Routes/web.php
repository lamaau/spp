<?php

use Illuminate\Support\Facades\Route;
use Modules\Payment\Http\Controllers\PaymentController;
use Modules\Payment\Http\Controllers\SpendingController;

Route::middleware(['auth', 'verified', 'installed'])->group(function () {
    Route::prefix('payment')->as('payment.')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name('index');
        Route::get('print-yearly/{params?}', [PaymentController::class, 'printYearly'])->name('print-yearly');
    });

    Route::prefix('spending')->as('spending.')->group(function () {
        Route::get('/', [SpendingController::class, 'index'])->name('index');
    });
});

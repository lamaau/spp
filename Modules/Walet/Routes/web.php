<?php

use Illuminate\Support\Facades\Route;
use Modules\Walet\Http\Controllers\WaletController;

Route::middleware(['auth', 'verified', 'installed'])->group(function () {
    Route::prefix('walet')->as('walet.')->group(function () {
        Route::get('/income', [WaletController::class, 'income'])->name('income');
        Route::get('/spending', [WaletController::class, 'spending'])->name('spending');
    });
});

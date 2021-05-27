<?php

use Illuminate\Support\Facades\Route;
use Modules\Walet\Http\Controllers\WaletController;

Route::prefix('walet')->as('walet.')->middleware('auth')->group(function () {
    Route::get('/income', [WaletController::class, 'income'])->name('income');
    Route::get('/spending', [WaletController::class, 'spending'])->name('spending');
});

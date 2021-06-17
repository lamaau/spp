<?php

use Illuminate\Support\Facades\Route;
use Modules\Setting\Http\Controllers\SettingController;

Route::middleware(['auth', 'verified', 'installed'])->group(function () {
    Route::prefix('setting')->as('setting.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::get('/general', [SettingController::class, 'general'])->name('general');
    });
});

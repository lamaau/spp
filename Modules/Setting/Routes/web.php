<?php

use App\Http\Middleware\Installed;
use Illuminate\Support\Facades\Route;
use Modules\Setting\Http\Controllers\LogController;
use Modules\Setting\Http\Controllers\SettingController;

Route::middleware(['auth', 'verified', Installed::class])->group(function () {
    Route::middleware(['can:manage_setting'])->group(function () {
        Route::prefix('setting')->as('setting.')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('index');
            Route::get('/role', [SettingController::class, 'role'])->name('role');
            Route::get('/general', [SettingController::class, 'general'])->name('general');
            Route::get('operator', [SettingController::class, 'operator'])->name('operator');
        });
    });

    Route::prefix('log')->as('log.')->group(function () {
        Route::get('/activity', [LogController::class, 'activity'])->name('activity');
    });
});

<?php

use Illuminate\Support\Facades\Route;
use Modules\Master\Http\Controllers\RoomController;
use Modules\Master\Http\Controllers\InstallController;

Route::middleware(['auth', 'verified', 'tenant'])->group(function () {
    /** install */
    Route::get('/install', [InstallController::class, 'view'])->name('install');
    Route::post('/install', [InstallController::class, 'setup'])->name('setup');

    /** data master */
    Route::group(['as' => 'master.'], function () {
        Route::prefix('rooms')->as('room.')->group(function () {
            Route::get('/', [RoomController::class, 'index'])->name('index');
        });
    });
});

<?php

use Illuminate\Support\Facades\Route;
use Modules\Setting\Http\Controllers\SettingController;

Route::prefix('setting')->as('setting.')->middleware('auth')->group(function () {
    Route::get('/', [SettingController::class, 'index'])->name('index');
    Route::get('/general', [SettingController::class, 'general'])->name('general');
    Route::get('/automation', [SettingController::class, 'automation'])->name('automation');
});

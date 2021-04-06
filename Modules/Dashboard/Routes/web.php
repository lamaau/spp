<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['installed', 'auth', 'verified'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
});

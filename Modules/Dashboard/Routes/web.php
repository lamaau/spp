<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['installed', 'auth', 'verified', 'tenant'])->group(function() {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
});

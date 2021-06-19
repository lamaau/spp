<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:web'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
});

Route::middleware('auth:student')->prefix('u')->group(function() {
    Route::get('dashboard', function() {
        return 'its here';
    })->name('u.dashboard');
});

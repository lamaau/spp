<?php

use App\Http\Middleware\Installed;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', Installed::class])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
});

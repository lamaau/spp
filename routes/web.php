<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

Route::middleware(['auth', 'verified', 'installed'])->group(function () {
    Route::get('notifications', NotificationController::class)->name('notifications');
});
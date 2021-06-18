<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

Route::middleware(['auth', 'verified', 'installed'])->group(function () {
    Route::get('notifications', NotificationController::class)->name('notifications');
});
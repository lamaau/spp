<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', GoenDashboardController::class)->name('home')->middleware(['auth', 'verified', 'installed']);

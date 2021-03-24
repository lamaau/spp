<?php

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;

Route::get('/home', GoenDashboardController::class)->name('home')->middleware(['auth', 'verified', 'installed', InitializeTenancyBySubdomain::class]);

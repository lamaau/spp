<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Install;
use App\Http\Middleware\NotInstalled;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;

Route::middleware(['auth', 'verified', NotInstalled::class])->group(function () {
    Route::get('install', Install::class)->name('install');
});

Route::middleware('guest')->group(function () {
    Route::get('/', Login::class);
    Route::get('login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', LogoutController::class)->name('logout');
});

<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstallController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome')->middleware('guest');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/install', [InstallController::class, 'index'])->name('install');
    Route::post('/install', [InstallController::class, 'store'])->name('store.install');
});

Route::middleware(['auth', 'installed', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

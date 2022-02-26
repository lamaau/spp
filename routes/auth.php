<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::middleware('auth')->group(fn (): array => [
    Route::delete('logout', [LoginController::class, 'destroy'])->name('logout'),
]);

Route::middleware('tenancy.guest')->group(fn (): array => [
    Route::get('login', [LoginController::class, 'create'])->name('login')->middleware('guest'),
    Route::post('login', [LoginController::class, 'store'])->name('login.store')->middleware('guest'),

    Route::get('register', [RegisterController::class, 'create'])->name('register'),
    Route::post('register', [RegisterController::class, 'store'])->name('register.store'),
]);

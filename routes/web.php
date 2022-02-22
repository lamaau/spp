<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\Acl\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;

Route::get('/', DashboardController::class);
Route::get('/dashboard', DashboardController::class);

Route::prefix('master')->as('master')->group(fn (): array => [
    Route::resource('/room', RoomController::class),
    Route::resource('/year', YearController::class),
]);

Route::prefix('acl')->as('acl')->group(fn (): array => [
    Route::resource('/user', UserController::class),
]);

Route::controller(ReportController::class)->prefix('report')->as('report.')->group(fn (): array => [
    Route::get('/', 'index')->name('index'),
]);

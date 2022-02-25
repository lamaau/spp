<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\RoomController;
use App\Http\Controllers\Client\YearController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Client\BillController;
use App\Http\Controllers\Client\ReportController;
use App\Http\Controllers\Client\StudentController;
use App\Http\Controllers\Client\DashboardController;

Route::get('/', DashboardController::class);
Route::get('/dashboard', DashboardController::class)->name('dashboard');

Route::prefix('master')->as('master.')->group(fn (): array => [
    Route::resource('/room', RoomController::class)->except(['create', 'edit']),
    Route::resource('/year', YearController::class)->except(['create', 'edit']),
    Route::resource('/student', StudentController::class)->except(['create', 'edit']),
    Route::resource('/bill', BillController::class)->except(['create', 'edit']),
]);

Route::prefix('acl')->as('acl')->group(fn (): array => [
    Route::resource('/user', UserController::class),
]);

Route::controller(ReportController::class)->prefix('report')->as('report.')->group(fn (): array => [
    Route::get('/', 'index')->name('index'),
]);

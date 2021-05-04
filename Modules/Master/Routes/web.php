<?php

use Illuminate\Support\Facades\Route;
use Modules\Master\Http\Controllers\RoomController;
use Modules\Master\Http\Controllers\MajorController;
use Modules\Master\Http\Controllers\InstallController;
use Modules\Master\Http\Controllers\StudentController;
use Modules\Master\Http\Controllers\SchoolYearController;

Route::middleware(['auth', 'verified'])->group(function () {
    /** install */
    Route::get('/install', [InstallController::class, 'view'])->name('install');
    Route::post('/install', [InstallController::class, 'setup'])->name('setup');

    /** data master */
    Route::group(['as' => 'master.'], function () {
        /** Room */
        Route::prefix('room')->as('room.')->group(function () {
            Route::get('/', [RoomController::class, 'index'])->name('index');
        });

        /** Bill */
        Route::prefix('bill')->as('bill.')->group(function () {
            Route::get('/', BillController::class)->name('index');
        });

        /** Major */
        Route::prefix('major')->as('major.')->group(function () {
            Route::get('/', [MajorController::class, 'index'])->name('index');
        });

        /** SchoolYear */
        Route::prefix('school-year')->as('school-year.')->group(function () {
            Route::get('/', [SchoolYearController::class, 'index'])->name('index');
        });

        /** Student */
        Route::prefix('student')->as('student.')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('index');
            Route::get('/create', [StudentController::class, 'create'])->name('create');
            Route::post('/store', [StudentController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [StudentController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [StudentController::class, 'destroy'])->name('destroy');
            Route::get('setting-room', [StudentController::class, 'settingRoom'])->name('setting-room');
        });
    });
});

<?php

use App\Http\Middleware\Installed;
use Illuminate\Support\Facades\Route;
use Modules\Master\Http\Controllers\RoomController;
use Modules\Master\Http\Controllers\StudentController;
use Modules\Master\Http\Controllers\SchoolYearController;

Route::middleware(['auth', 'verified', Installed::class])->group(function () {
    /** data master */
    Route::group(['as' => 'master.'], function () {
        /** Room */
        Route::middleware('can:manage_room')->prefix('room')->as('room.')->group(function () {
            Route::get('/', [RoomController::class, 'index'])->name('index');
        });

        /** Bill */
        Route::middleware('can:manage_bill')->prefix('bill')->as('bill.')->group(function () {
            Route::get('/', BillController::class)->name('index');
        });

        /** SchoolYear */
        Route::middleware('can:manage_school_year')->prefix('school-year')->as('school-year.')->group(function () {
            Route::get('/', [SchoolYearController::class, 'index'])->name('index');
        });

        /** Student */
        Route::middleware('can:manage_student')->prefix('student')->as('student.')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('index');
            Route::get('/create', [StudentController::class, 'create'])->name('create');
            Route::post('/store', [StudentController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [StudentController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [StudentController::class, 'destroy'])->name('destroy');
            Route::get('setting-room', [StudentController::class, 'settingRoom'])->name('setting-room');
            Route::get('setting-status', [StudentController::class, 'settingStatus'])->name('setting-status');
        });
    });
});

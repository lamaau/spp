<?php

use Illuminate\Support\Facades\Route;
use Modules\GoenDataMaster\Http\Controllers\Api\InvoiceJsonController;
use Modules\GoenDataMaster\Http\Controllers\Api\LevelJsonController;
use Modules\GoenDataMaster\Http\Controllers\Api\RoomJsonController;
use Modules\GoenDataMaster\Http\Controllers\ImportController;
use Modules\GoenDataMaster\Http\Controllers\QuestionController;
use Modules\GoenDataMaster\Http\Controllers\ScheduleController;
use Modules\GoenDataMaster\Http\Controllers\SettingController;
use Modules\GoenDataMaster\Http\Controllers\StudentController;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

Route::middleware([
    'auth',
    'verified',
    InitializeTenancyBySubdomain::class,
    PreventAccessFromCentralDomains::class
])->group(function () {
    Route::get('/install', [SettingController::class, 'install'])->name('install');
    Route::post('/install', [SettingController::class, 'store'])->name('store.install');
});

Route::middleware(['installed'])->group(function () {
    Route::prefix('invoice')->as('invoice.')->group(function () {
        Route::get('/', InvoiceController::class)->name('index');
        // -----------------------------------------------------
        Route::get('list', [InvoiceJsonController::class, 'invoices']);
    });

    /** Setting */
    Route::prefix('settings')->as('setting.')->group(function () {
        Route::get('/', [SettingController::class, 'setting'])->name('index');
    });

    Route::prefix('levels')->as('level.')->group(function () {
        Route::get('/', LevelController::class)->name('index');
        // -----------------------------------------------------
        Route::get('/list', [LevelJsonController::class, 'levels']);
        Route::post('/store', [LevelJsonController::class, 'store']);
        Route::get('/edit/{id}', [LevelJsonController::class, 'edit']);
        Route::post('/update/{id}', [LevelJsonController::class, 'update']);
        Route::post('/delete', [LevelJsonController::class, 'destroy']);
    });

    Route::prefix('rooms')->as('room.')->group(function () {
        Route::get('/', RoomController::class)->name('index');
        // -----------------------------------------------------
        Route::get('/list', [RoomJsonController::class, 'rooms']);
        Route::post('/store', [RoomJsonController::class, 'store']);
        Route::get('/edit/{id}', [RoomJsonController::class, 'edit']);
        Route::post('/update/{id}', [RoomJsonController::class, 'update']);
        Route::post('/delete', [RoomJsonController::class, 'delete']);
    });

    /** Student */
    Route::prefix('students')->as('student.')->group(function () {
        /** Api for table student */
        Route::get('/list', [StudentController::class, 'students']);

        Route::get('/', [StudentController::class, 'index'])->name('index');
        Route::get('/create', [StudentController::class, 'create'])->name('create');
    });

    /** Question */
    Route::prefix('questions')->as('question.')->group(function () {
        Route::get("/", [QuestionController::class, 'index'])->name('index');
    });

    /** Schedule */
    Route::prefix('schedules')->as('schedule.')->group(function () {
        Route::get("/", [ScheduleController::class, 'index'])->name('index');
    });

    /** Import */
    Route::prefix('import')->as('import.')->group(function () {
        Route::post('/students', [ImportController::class, 'student'])->name('students');
    });
});

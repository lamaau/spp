<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;
use App\Models\Level;

Route::view('/', 'welcome')->name('welcome')->middleware('guest');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/install', [SettingController::class, 'install'])->name('install');
    Route::post('/install', [SettingController::class, 'store'])->name('store.install');

    Route::middleware(['installed'])->group(function () {
        /** Home */
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        /** Setting */
        Route::prefix('settings')->as('setting.')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('index');
        });

        Route::prefix('levels')->as('level.')->group(function () {
            Route::get('/', [LevelController::class, 'index'])->name('index');

            /** CRUD OPERATION */
            Route::get('/list', [LevelController::class, 'levels']);
            Route::post('/store', [LevelController::class, 'store']);
            Route::get('/edit/{id}', [LevelController::class, 'edit']);
            Route::post('/update/{id}', [LevelController::class, 'update']);
        });

        Route::prefix('rooms')->as('room.')->group(function () {
            Route::get('/', [RoomController::class, 'index'])->name('index');
            Route::post('/store', [RoomController::class, 'store'])->name('store');
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
});

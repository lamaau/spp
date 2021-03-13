<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\QuestionController;

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

        /** Student */
        Route::prefix('students')->as('student.')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('index');
            Route::get('/list', [StudentController::class, 'student'])->name('student');
        });

        /** Question */
        Route::prefix('questions')->as('question.')->group(function () {
            Route::get("/", [QuestionController::class, 'index'])->name('index');
        });

        /** Import */
        Route::prefix('import')->as('import.')->group(function () {
            Route::post('/students', [ImportController::class, 'student'])->name('students');
        });
    });
});

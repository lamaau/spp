<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentController;

Route::view('/', 'welcome')->name('welcome')->middleware('guest');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/install', [InstallController::class, 'index'])->name('install');
    Route::post('/install', [InstallController::class, 'store'])->name('store.install');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::prefix('students')->as('student.')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('index');
        Route::post('/import', [StudentController::class, 'import'])->name('import');
    });

    Route::prefix('questions')->as('question.')->group(function () {
        Route::get("/", [QuestionController::class, 'index'])->name('index');
    });
});

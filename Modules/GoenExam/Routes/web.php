<?php

use Illuminate\Support\Facades\Route;

Route::prefix('exam')->group(function () {
    Route::get('/', ExamController::class)->name('exam');
});

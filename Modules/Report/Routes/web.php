<?php

use Illuminate\Support\Facades\Route;
use Modules\Report\Http\Controllers\ReportController;

Route::prefix('report')->as('report.')->middleware(['auth', 'verified', 'installed'])->group(function () {
    Route::get('/', [ReportController::class, 'index'])->name('index');
    Route::get('/student', [ReportController::class, 'student'])->name('student');
    Route::get('/finance', [ReportController::class, 'finance'])->name('finance');
});

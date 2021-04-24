<?php

use Illuminate\Support\Facades\Route;
use Modules\Master\Http\Controllers\Json\RoomJsonController;
use Modules\Master\Http\Controllers\Json\ConstantJsonController;
use Modules\Master\Http\Controllers\Json\SchoolYearJsonController;

Route::prefix('v1')->group(function () {
    /** Constant */
    Route::prefix('constant')->group(function () {
        Route::get('sex', [ConstantJsonController::class, 'sex']);
        Route::get('force', [ConstantJsonController::class, 'force']);
        Route::get('religion', [ConstantJsonController::class, 'religion']);
    });

    Route::prefix('school-year')->group(function () {
        Route::get('/', [SchoolYearJsonController::class, 'select']);
    });

    /** Room */
    Route::prefix('room')->group(function () {
        Route::get('/', [RoomJsonController::class, 'all']);
    });
});

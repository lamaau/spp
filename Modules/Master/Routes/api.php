<?php

use Illuminate\Support\Facades\Route;
use Modules\Master\Http\Controllers\Json\RoomJsonController;
use Modules\Master\Http\Controllers\Json\ConstantJsonController;

Route::prefix('v1')->group(function () {
    Route::prefix('constant')->group(function() {
        Route::get('sex', [ConstantJsonController::class, 'sex']);
        Route::get('force', [ConstantJsonController::class, 'force']);
        Route::get('religion', [ConstantJsonController::class, 'religion']);
    });
    
    Route::prefix('room')->group(function () {
        Route::get('/', [RoomJsonController::class, 'all']);
    });
});

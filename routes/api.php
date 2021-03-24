<?php

use App\Http\Controllers\Api\TerritoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::prefix('v1')->group(function () {
    Route::get('provinces', [TerritoryController::class, 'provinces']);
    Route::get('cities/{id}', [TerritoryController::class, 'cities']);
    Route::get('districts/{id}', [TerritoryController::class, 'districts']);
    Route::get('sub-districts/{id}', [TerritoryController::class, 'sub_districts']);
});

<?php

use Illuminate\Support\Facades\Route;
use Modules\Document\Http\Controllers\DocumentController;

Route::middleware(['auth', 'installed', 'verified'])->prefix('document')->as('document.')->group(function () {
    Route::get('/', [DocumentController::class, 'index'])->name('index');
});

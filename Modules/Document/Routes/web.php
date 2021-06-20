<?php

use App\Http\Middleware\Installed;
use Illuminate\Support\Facades\Route;
use Modules\Document\Http\Controllers\DocumentController;

Route::middleware(['can:manage_document', 'auth', 'verified', Installed::class])->prefix('document')->as('document.')->group(function () {
    Route::get('/', [DocumentController::class, 'index'])->name('index');
});

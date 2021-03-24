<?php

Route::prefix('committee')->group(function () {
    Route::get('/', GoenCommitteeController::class)->name('committee');
});

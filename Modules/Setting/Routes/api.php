<?php

use Illuminate\Support\Facades\Route;
use Modules\Setting\Repository\SettingRepository;

Route::get('/setting/pusher', function (SettingRepository $setting) {
    if ($setting->pusherConfiguration()) {
        return response()->json([
            'success' => true,
            'data' => $setting->pusherConfiguration(),
        ], 200);
    }

    return response()->json([
        'success' => true,
        'data' => null,
    ], 200);
});

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function __invoke()
    {
        return view('notifications', [
            'title' => 'Semua notifikasi',
        ]);
    }
}

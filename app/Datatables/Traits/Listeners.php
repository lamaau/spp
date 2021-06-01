<?php

namespace App\Datatables\Traits;

use Illuminate\Support\Facades\Auth;

trait Listeners
{
    public function getListeners()
    {
        $userId = Auth::user()->id;

        return [
            "echo-private:Modules.Master.Entities.User.{$userId},.Illuminate\Notifications\Events\BroadcastNotificationCreated" => '$refresh',
        ];
    }
}

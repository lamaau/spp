<?php

use Modules\Master\Entities\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('Modules.Master.Entities.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('notifications.{channelUser}', function ($user, User $channelUser) {
    return (int) $user->id === (int) $channelUser->id;
});

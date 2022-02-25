<?php

namespace App\Listeners;

class SetLastLoginOfUser
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $event->user->last_login_at = now();
        $event->user->save();
    }
}

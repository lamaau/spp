<?php

namespace App\Observers;

use App\Models\Room;

class RoomObserver
{
    /**
     * Handle the Room "created" event.
     *
     * @param  \App\Models\Room  $room
     * @return void
     */
    public function creating(Room $room)
    {
        $room->fill([
            'created_by' => user()->id,
            // 'school_id' => school()->id,
        ]);
    }
}

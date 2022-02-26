<?php

namespace App\Observers;

use App\Models\Year;

class YearObserver
{
    /**
     * Handle the Room "created" event.
     *
     * @param  \App\Models\Year  $room
     * @return void
     */
    public function creating(Year $year)
    {
        $year->fill([
            'created_by' => user()->id,
        ]);
    }
}

<?php

namespace Modules\GoenDataMaster\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Utils\Uuid;

class Room extends Model
{
    use Uuid, HasFactory;

    protected $guarded = [];

    /**
     * Get level
     *
     * @return HasOne
     */
    public function level(): HasOne
    {
        return $this->hasOne(Level::class, 'level_id', 'id');
    }
}

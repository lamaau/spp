<?php

namespace Modules\Master\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Master\Tenant\Traits\ForTenants;

class Room extends Model
{
    use HasFactory, ForTenants;

    protected $guarded = [];
    
    protected static function newFactory()
    {
        return \Modules\Master\Database\Factories\RoomFactory::new();
    }
}

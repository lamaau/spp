<?php

namespace Modules\Master\Entities;

use Modules\Utils\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends Model
{
    use Uuid, HasFactory;

    protected $guarded = [];
    
    protected static function newFactory()
    {
        return \Modules\Master\Database\Factories\TenantFactory::new();
    }
}

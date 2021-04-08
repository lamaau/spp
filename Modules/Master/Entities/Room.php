<?php

namespace Modules\Master\Entities;

use Modules\Utils\Uuid;
use Illuminate\Database\Eloquent\Model;
use Modules\Master\Tenant\TenantRepository;
use Modules\Master\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model implements TenantRepository
{
    use HasFactory, Uuid, ForTenants;

    protected $guarded = [];

    public function getTenantId()
    {
        return $this->tenant_id;
    }

    protected static function newFactory()
    {
        return \Modules\Master\Database\Factories\RoomFactory::new();
    }
}

<?php

namespace Modules\Master\Entities;

use Modules\Utils\Uuid;
use Illuminate\Database\Eloquent\Model;
use Modules\Master\Tenant\TenantRepository;
use Modules\Master\Tenant\Traits\ForTenants;

class Setting extends Model implements TenantRepository
{
    use Uuid, ForTenants;

    protected $guarded = [];

    public function getTenantId()
    {
        return $this->tenant_id;
    }
}

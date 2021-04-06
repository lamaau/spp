<?php

namespace Modules\Master\Entities;

use Modules\Utils\Uuid;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Uuid;

    protected $guarded = [];

    public function getTenantId()
    {
        return $this->tenant_id;
    }
}

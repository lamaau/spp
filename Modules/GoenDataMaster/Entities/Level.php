<?php

namespace Modules\GoenDataMaster\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Utils\Uuid;

class Level extends Model
{
    use Uuid;

    protected $guarded = [];
}

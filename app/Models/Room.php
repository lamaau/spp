<?php

namespace App\Models;

use App\Models\Concerns\Eloquent;
use App\Models\Relations\HasAuthor;
use RomegaDigital\Multitenancy\Traits\BelongsToTenant;

class Room extends Eloquent
{
    use HasAuthor,
        BelongsToTenant;

    protected $fillable = [
        'name',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}

<?php

namespace App\Models;

use App\Models\Concerns\Eloquent;
use App\Models\Concerns\WithTenant;
use App\Models\Relations\HasAuthor;

class Room extends Eloquent
{
    use HasAuthor,
        WithTenant;

    protected $fillable = [
        'name',
        'school_id',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}

<?php

namespace App\Models;

use App\Models\Concerns\Eloquent;
use App\Models\Concerns\WithTenant;
use App\Models\Relations\HasAuthor;

class Year extends Eloquent
{
    use WithTenant,
        HasAuthor;

    protected $fillable = [
        'year',
        'school_id',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}

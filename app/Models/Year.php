<?php

namespace App\Models;

use App\Models\Concerns\Eloquent;
use App\Models\Relations\HasAuthor;

class Year extends Eloquent
{
    use HasAuthor;

    protected $fillable = [
        'year',
        'school_id',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}

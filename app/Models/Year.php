<?php

namespace App\Models;

use App\Models\Concerns\Eloquent;
use App\Models\Relations\WithAuthor;

class Year extends Eloquent
{
    use WithAuthor;

    protected $fillable = [
        'year',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}

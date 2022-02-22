<?php

namespace App\Models;

use App\Models\Concerns\Eloquent;
use App\Models\Relations\WithAuthor;

class Room extends Eloquent
{
    use WithAuthor;

    protected $fillable = [
        'name',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}

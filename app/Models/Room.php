<?php

namespace App\Models;

use App\Models\Concerns\Eloquent;
use App\Models\Concerns\WithUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Eloquent
{
    use WithUuid, HasFactory;

    protected $fillable = [
        'name',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}

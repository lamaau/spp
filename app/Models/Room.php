<?php

namespace App\Models;

use App\Models\Concerns\Eloquent;
use App\Models\Concerns\WithUuid;
use App\Models\Concerns\WithTenant;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Eloquent
{
    use WithUuid,
        WithTenant,
        SoftDeletes;

    protected $fillable = [
        'name',
        'school_id',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}

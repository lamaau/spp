<?php

namespace App\Models;

use App\Enums\BillType;
use App\Models\Concerns\Eloquent;
use App\Models\Concerns\WithTenant;
use App\Models\Relations\HasAuthor;

class Bill extends Eloquent
{
    use HasAuthor,
        WithTenant;

    protected $fillable = [
        'type',
        'name',
        'amount',
        'school_id',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $casts = [
        'type' => BillType::class,
    ];
}

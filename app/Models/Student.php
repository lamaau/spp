<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\Religion;
use App\Enums\UserStatus;
use App\Models\Concerns\Eloquent;
use App\Models\Relations\HasAuthor;

class Student extends Eloquent
{
    use HasAuthor;

    protected $fillable = [
        'nis',
        'nisn',
        'phone',
        'religion',
        'status',
        'gender',
        'user_id',
        'school_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'gender' => Gender::class,
        'status' => UserStatus::class,
        'religion' => Religion::class,
    ];
}

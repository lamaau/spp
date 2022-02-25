<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\Religion;
use App\Enums\UserStatus;
use App\Models\Concerns\Eloquent;
use App\Models\Concerns\WithTenant;
use App\Models\Relations\HasAuthor;

class Student extends Eloquent
{
    use WithTenant,
        HasAuthor;

    protected $fillable = [
        'name',
        'nis',
        'nisn',
        'email',
        'phone',
        'religion',
        'status',
        'gender',
        'school_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'gender' => Gender::class,
        'status' => UserStatus::class,
        'religion' => Religion::class,
    ];
}

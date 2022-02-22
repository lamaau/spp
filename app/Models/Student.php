<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\Religion;
use App\Enums\UserStatus;
use App\Models\Concerns\Eloquent;
use App\Models\Relations\WithAuthor;

class Student extends Eloquent
{
    use WithAuthor;

    protected $fillable = [
        'name',
        'nis',
        'nisn',
        'email',
        'phone',
        'religion',
        'status',
        'gender',
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

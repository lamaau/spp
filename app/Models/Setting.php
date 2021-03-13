<?php

namespace App\Models;

use App\Utils\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory, Uuid;

    protected $guarded = [];
}

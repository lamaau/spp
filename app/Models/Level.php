<?php

namespace App\Models;

use App\Utils\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use Uuid, HasFactory;

    protected $guarded = [];
}

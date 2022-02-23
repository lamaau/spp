<?php

namespace App\Enums;

use App\Enums\Concerns\InvokeableCases;

enum Status: int
{
    use InvokeableCases;

    case ACTIVE = 1;
    case INACTIVE = 2;
}

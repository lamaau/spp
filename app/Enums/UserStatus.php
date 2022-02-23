<?php

namespace App\Enums;

use App\Enums\Concerns\InvokeableCases;

enum UserStatus: int
{
    use InvokeableCases;

    case ACTIVE = 1;
    case INACTIVE = 2;
    case DISABLED = 3;
}

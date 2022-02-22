<?php

namespace App\Enums;

use App\Enums\Concerns\InokeableCases;

enum UserStatus: int
{
    use InokeableCases;

    case ACTIVE = 1;
    case INACTIVE = 2;
}

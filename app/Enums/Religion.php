<?php

namespace App\Enums;

use App\Enums\Concerns\InokeableCases;

enum Religion: int
{
    use InokeableCases;

    case ISLAM = 1;
    case KRISTEN = 2;
    case HINDU = 3;
    case BUDHA = 4;
    case OTHER = 5;
}

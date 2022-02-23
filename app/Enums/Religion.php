<?php

namespace App\Enums;

use App\Enums\Concerns\InvokeableCases;

enum Religion: int
{
    use InvokeableCases;

    case ISLAM = 1;
    case KRISTEN = 2;
    case HINDU = 3;
    case BUDHA = 4;
    case OTHER = 5;
}

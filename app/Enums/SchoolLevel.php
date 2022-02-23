<?php

namespace App\Enums;

use App\Enums\Concerns\InokeableCases;

enum ShcoolLevel: int
{
    use InokeableCases;

    case SD = 1;
    case SMP = 2;
    case SMA = 3;
    case OTHER = 4;
}

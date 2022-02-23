<?php

namespace App\Enums;

use App\Enums\Concerns\InvokeableCases;

enum SchoolLevel: int
{
    use InvokeableCases;

    case SD = 1;
    case SMP = 2;
    case SMA = 3;
    case OTHER = 4;
}

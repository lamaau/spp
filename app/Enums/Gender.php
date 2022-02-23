<?php

namespace App\Enums;

use App\Enums\Concerns\InvokeableCases;

enum Gender: int
{
    use InvokeableCases;

    case MAN = 1;
    case WOMAN = 2;
}

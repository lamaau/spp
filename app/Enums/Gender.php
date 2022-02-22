<?php

namespace App\Enums;

use App\Enums\Concerns\InokeableCases;

enum Gender: int
{
    use InokeableCases;

    case MAN = 1;
    case WOMAN = 2;
}

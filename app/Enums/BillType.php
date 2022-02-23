<?php

namespace App\Enums;

use App\Enums\Concerns\InvokeableCases;

enum BillType: int
{
    use InvokeableCases;
    
    case WEEKLY = 1;
    case MONTHLY = 2;
    case YEARLY = 3;
}
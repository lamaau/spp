<?php

namespace Modules\Master\Constants;

use App\Constants\Constants;

class ReligionConstant extends Constants
{
    const ISLAM  = 1;
    const KRISTEN = 2;
    const HINDU = 3;
    const BUDHA = 4;

    public static function labels(): array
    {
        return [
            self::ISLAM  => 'Islam',
            self::KRISTEN => 'Kristen',
            self::HINDU => 'Hindu',
            self::BUDHA => 'Budha',
        ];
    }
}

<?php

namespace Modules\Master\Constants;

use App\Constants\Constants;

class ReligionConstant extends Constants
{
    const ISLAM  = 1;
    const KATOLIK = 2;
    const PROTESTAN = 3;
    const HINDU = 4;
    const BUDHA = 5;

    public static function labels(): array
    {
        return [
            self::ISLAM  => 'Islam',
            self::KATOLIK => 'Katolik',
            self::PROTESTAN => 'Protestan',
            self::HINDU => 'Hindu',
            self::BUDHA => 'Budha',
        ];
    }
}

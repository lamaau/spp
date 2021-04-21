<?php

namespace Modules\Master\Constants;

use App\Constants\Constants;

class SexConstant extends Constants
{
    const MAN = 1;
    const WOMAN = 2;
    const UNKNOWN = 3;

    public static function labels(): array
    {
        return [
            static::MAN => 'Pria',
            static::WOMAN => 'Wanita',
            static::UNKNOWN => 'Lainnya',
        ];
    }
}

<?php

namespace Modules\Master\Constants;

use App\Constants\Constants;

class UserConstant extends Constants
{
    const ACTIVE = 1;
    const GRADUATE = 2;
    const MOVE = 3;

    public static function labels(): array
    {
        return [
            static::ACTIVE => 'Aktif',
            static::GRADUATE => 'Lulus',
            static::MOVE => 'Pindah',
        ];
    }
}

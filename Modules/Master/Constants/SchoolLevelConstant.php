<?php

namespace Modules\Master\Constants;

use App\Constants\Constants;

class SchoolLevelConstant extends Constants
{
    const SD  = 1;
    const SMP = 2;
    const SMA = 3;

    public static function labels(): array
    {
        return [
            self::SD  => 'Sekolah Dasar',
            self::SMP => 'Sekolah Menengah Pertama',
            self::SMA => 'Sekolah Menengah Atas',
        ];
    }
}

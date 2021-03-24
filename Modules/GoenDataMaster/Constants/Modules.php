<?php

namespace Modules\GoenDataMaster\Constants;

use App\Constants\Constants;

class Modules extends Constants
{
    const CBT = 1;
    const KOM = 2;

    /**
     * Labels of modules
     *
     * @return array
     */
    public static function labels(): array
    {
        return [
            self::CBT => 'Computer Based Testing',
            self::KOM => 'Sistem Informasi Manajemen Komite',
        ];
    }
}

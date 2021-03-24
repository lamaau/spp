<?php

namespace Modules\GoenDataMaster\Constants;

use App\Constants\Constants;

class Payment extends Constants
{
    const UNPAID    = 0;
    const PROGGRESS = 1;
    const PAID      = 2;

    /**
     * Labels of payment status
     *
     * @return array
     */
    public static function labels(): array
    {
        return [
            self::UNPAID    => 'unpaid',
            self::PROGGRESS => 'process',
            self::PAID      => 'paid',
        ];
    }
}

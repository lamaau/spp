<?php

namespace Modules\Payment\Constants;

use App\Constants\Constants;

class PaymentStatus extends Constants
{
    const LUNAS  = 1;
    const TUNGGAK = 2;

    public static function labels(): array
    {
        return [
            self::LUNAS  => 'Lunas',
            self::TUNGGAK => 'Tunggak',
        ];
    }
}

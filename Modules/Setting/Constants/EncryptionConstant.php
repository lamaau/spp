<?php

namespace Modules\Setting\Constants;

use App\Constants\Constants;

class EncryptionConstant extends Constants
{
    const TLS  = 1;
    const SSL = 2;

    public static function labels(): array
    {
        return [
            self::TLS => 'tls',
            self::SSL => 'ssl',
        ];
    }
}

<?php

namespace Modules\Setting\Constants;

use App\Constants\Constants;

class UserConstant extends Constants
{
    const ACTIVE = 1;
    const SUSPEND = 2;

    public static function labels(): array
    {
        return [
            self::ACTIVE => 'Aktif',
            self::SUSPEND => 'Suspend',
        ];
    }
}

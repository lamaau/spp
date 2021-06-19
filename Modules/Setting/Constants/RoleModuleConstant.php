<?php

namespace Modules\Setting\Constants;

use App\Constants\Constants;

class RoleModuleConstant extends Constants
{
    public static function labels(): array
    {
        return [
            '*' => 'Semua',
            'master' => 'Data Master',
            'payment' => 'Keuangan',
            'report' => 'Laporan',
            'setting' => 'Pengaturan'
        ];
    }
}
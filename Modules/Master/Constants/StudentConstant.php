<?php

namespace Modules\Master\Constants;

use App\Constants\Constants;

class StudentConstant extends Constants
{
    const ACTIVE = 1;
    const GRADUATE = 2;
    const MOVE = 3;
    const QUIT = 4;

    public static function labels(): array
    {
        return [
            static::ACTIVE => 'Aktif',
            static::GRADUATE => 'Lulus',
            static::MOVE => 'Pindah',
            static::QUIT => 'Berhenti',
        ];
    }

    public static function types(): array
    {
        return [
            static::ACTIVE => 'success',
            static::GRADUATE => 'info',
            static::MOVE => 'primary',
            static::QUIT => 'danger',
        ]; 
    }
}

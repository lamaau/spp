<?php

namespace Modules\GoenDataMaster\Constants;

use App\Constants\Constants;
use Illuminate\Support\Carbon;
use Modules\GoenDataMaster\Entities\Setting;

class Plan extends Constants
{
    const FIRST  = 1;
    const SECOND = 2;
    const THREE  = 3;

    /**
     * Labels of plans
     *
     * @return array
     */
    public static function labels(): array
    {
        return [
            self::FIRST  => '3 Bulan',
            self::SECOND => '6 Bulan',
            self::THREE  => '1 Tahun',
        ];
    }

    /**
     * Prices of plans
     *
     * @return array
     */
    public static function price(): array
    {
        return [
            self::FIRST  => 200000,
            self::SECOND => 400000,
            self::THREE  => 600000,
        ];
    }

    /**
     * Plan expired time
     * 
     * @return array
     */
    public static function expired(): array
    {
        return [
            self::FIRST  => Carbon::now()->addMonth(3),
            self::SECOND => Carbon::now()->addMonth(6),
            self::THREE  => Carbon::now()->addMonth(12),
        ];
    }

    /**
     * Generate invoice
     *
     * @return string
     */
    public static function invoice(): string
    {
        $setting = Setting::count();
        return "G-" . str_pad($setting, 7, "0", STR_PAD_LEFT);
    }
}

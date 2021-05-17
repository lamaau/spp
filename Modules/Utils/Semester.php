<?php

namespace Modules\Utils;

class Semester
{
    /**
     * Semester ganjil (7 - 12)
     *
     * @return array
     */
    public static function odd()
    {
        $labels = [];

        for ($i = 7; $i <= 12; $i++) {
            $labels[(int)$i] = self::translate($i);
        }

        return $labels;
    }

    /**
     * Semester genap (1 - 6)
     *
     * @return array
     */
    public static function even(): array
    {
        $labels = [];

        for ($i = 1; $i <= 6; $i++) {
            $labels[(int)$i] = self::translate($i);
        }

        return $labels;
    }

    /**
     * Translate from month number to name
     *
     * @param integer $key
     * @return string
     */
    protected static function translate(int $key): string
    {
        return self::monthNameTranslated()[$key];
    }

    /**
     * Month name in indonesian
     *
     * @return array
     */
    public static function monthNameTranslated(): array
    {
        return [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];
    }
}

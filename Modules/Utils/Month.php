<?php

namespace Modules\Utils;

class Month
{
    public static function number(): array
    {
        $labels = [];
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = str_pad($i, 2, '0', STR_PAD_LEFT);
        }

        return $labels;
    }
    
    public static function prefixName(): array
    {
        return [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "Mei",
            "Jun",
            "Jul",
            "Agu",
            "Sep",
            "Okt",
            "Nov",
            "Des",
        ];
    }
}

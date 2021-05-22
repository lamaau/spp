<?php

namespace Modules\Payment\Utils;

class Trx
{
    /**
     * Generate trx
     *
     * @param string $model
     * @return string
     */
    public static function generate(string $model): string
    {
        $date    = date('Y-m-d');
        $result  = $model::query()->whereDate('created_at', $date)->get();

        return 'TRX-' . $date . '-' . sprintf('%06s', $result->count() + 1);
    }
}

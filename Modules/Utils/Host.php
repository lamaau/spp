<?php

namespace App\Utils;

class Host
{
    /**
     * Get domain
     *
     * @return string
     */
    public static function domain(): string
    {
        return '.' . explode('//', config('app.url'))[1];
    }

    /**
     * Get subdomain
     *
     * @return string
     */
    public static function subdomain($request): string
    {
        return explode(static::domain(), $request->getHost())[0];
    }
}

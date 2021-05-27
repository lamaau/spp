<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class RegionalFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'regional';
    }
}

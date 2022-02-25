<?php

namespace App\Enums;

use App\Enums\Concerns\HasLabel;
use Illuminate\Support\Collection;
use App\Enums\Concerns\InvokeableCases;

enum Religion: int implements HasLabel
{
    use InvokeableCases;

    case ISLAM = 1;
    case KRISTEN = 2;
    case HINDU = 3;
    case BUDHA = 4;

    public static function labels(): Collection
    {
        return collect(self::cases())->mapWithKeys(fn ($object) => [$object->value => ucwords(strtolower($object->name))]);
    }
}

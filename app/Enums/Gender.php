<?php

namespace App\Enums;

use App\Enums\Concerns\HasLabel;
use Illuminate\Support\Collection;
use App\Enums\Concerns\InvokeableCases;

enum Gender: int implements HasLabel
{
    use InvokeableCases;

    case MAN = 1;
    case WOMAN = 2;

    public function label(): string
    {
        return match ($this) {
            self::MAN => 'Pria',
            self::WOMAN => 'Wanita'
        };
    }

    public static function labels(): Collection
    {
        return collect(self::cases())->mapWithKeys(fn ($object) => [$object->value => $object->label()]);
    }
}

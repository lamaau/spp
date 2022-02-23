<?php

namespace App\Enums\Concerns;

/**
 * InvokeableCases
 */
trait InvokeableCases
{
    public function __invoke()
    {
        $this->value;
    }

    public static function __callStatic(mixed $name, mixed $arguments): mixed
    {
        return collect(static::cases())->firstWhere('name', $name)->value;
    }
}

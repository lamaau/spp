<?php

namespace App\Enums\Concerns;

use Illuminate\Support\Collection;

interface HasLabel
{
    /**
     * Labels
     *
     * @return Collection
     */
    public static function labels(): Collection;
}

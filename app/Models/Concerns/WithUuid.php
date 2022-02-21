<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait WithUuid
{
    protected static function bootWithUuid()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    /**
     * Disable incrementing
     *
     * @return boolean
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /**
     * Set key type
     *
     * @return string
     */
    public function getKeyType(): string
    {
        return 'string';
    }
}

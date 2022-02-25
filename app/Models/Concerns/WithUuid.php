<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use Illuminate\Support\Str;

/**
 * With Uuid
 */
trait WithUuid
{
    /**
     * Boot
     *
     * @return void
     */
    protected static function bootWithUuid()
    {
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
     * Set key type to string
     *
     * @return string
     */
    public function getKeyType(): string
    {
        return 'string';
    }
}

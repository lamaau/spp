<?php

namespace App\Models;

use App\Models\Concerns\Eloquent;
use App\Models\Concerns\WithUuid;

class School extends Eloquent
{
    protected $fillable = [
        'npsn',
        'name',
        'email',
        'phone',
        'fax',
        'logo',
        'level',
        'principal',
        'principal_number',
        'treasurer',
        'treasurer_number',
        'address',
        'created_by',
        'updated_by'
    ];

    /**
     * Bind current school in to container
     *
     * @param boolean $force
     * @return School
     */
    public function makeCurrent(bool $force = false): School
    {
        if (!$force && $this->isCurrent()) {
            return $this;
        }

        app()->instance(static::class, $this);

        return $this;
    }

    /**
     * Check if is current school
     *
     * @return boolean
     */
    public function isCurrent(): bool
    {
        return static::getCurrent()?->id === $this->id;
    }

    /**
     * If is not current
     *
     * @return boolean
     */
    public function isNotCurrent(): bool
    {
        return !$this->isCurrent();
    }

    /**
     * Get current binded school
     *
     * @return School|null
     */
    public static function getCurrent(): School|null
    {
        if (!app()->has(static::class)) {
            return null;
        }

        return app(static::class);
    }

    /**
     * Forget current school
     *
     * @return void
     */
    public function forgetCurrent(): void
    {
        if (!is_null(static::getCurrent())) {
            app()->forgetInstance(static::class);
        }
    }
}

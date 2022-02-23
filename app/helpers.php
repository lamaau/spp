<?php

declare(strict_types=1);

use App\Models\School;
use App\Models\User;

if (!function_exists('user')) {
    /**
     * Get current auth user
     *
     * @return User
     */
    function user(): User
    {
        return auth()->user();
    }
}

if (!function_exists('school')) {
    /**
     * Get current school
     *
     * @param string|null $id
     * @return School|null
     */
    function school(string|null $id = null): School|null
    {
        $school = null;

        if (is_null($id)) {
            $school = School::getCurrent();
        }

        if (is_string($id)) {
            $school = School::find($id);
        }

        return $school;
    }
}

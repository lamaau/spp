<?php

declare(strict_types=1);

use App\Models\Company;

if (!function_exists('company')) {
    /**
     * Get current company
     *
     * @param string|null $id
     * @return Company|null
     */
    function company(string|null $id = null): Company
    {
        $company = null;

        if (is_null($id)) {
            $company = Company::getCurrent();
        }

        return Company::first();
    }
}

if (!function_exists('setting')) {
    /**
     * Get or set specified setting value
     * 
     * If and array is passed as the key, we will asume you want to set an array of values
     *
     * @param array|null $key
     * @param array|string|null $default
     * @return mixed
     */
    function setting(array|null $key = null, $default = null): mixed
    {
        $setting = app('setting');

        if (is_null($key)) {
            return $setting;
        }

        if (is_array($key)) {
            $setting->set($key);

            return $setting;
        }

        return $setting->get($key, $default);
    }
}

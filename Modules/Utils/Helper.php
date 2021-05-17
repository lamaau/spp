<?php

use Illuminate\Support\Carbon;

if (!function_exists('create_date')) {
    /**
     * Create date
     *
     * @param  string $month
     * @return string
     */
    function create_date($month): string
    {
        $y = date('Y');
        return "$y-$month-1";
    }
}

if (!function_exists('format_date')) {
    /**
     * Convert readable date
     *
     * @param  string $date
     * @return string
     */
    function format_date($date): string
    {
        return Carbon::parse($date)->translatedFormat('d F Y');
    }
}

if (!function_exists('notify')) {
    /**
     * Notification
     *
     * @param  string $color
     * @param  string $message
     * @return void
     */
    function notify(string $color, string $title, string $message, string $position = 'topRight'): void
    {
        $notices = session()->get('notify');
        if (!is_array($notices)) {
            $notices = [];
        }

        array_push($notices, [
            'color' => $color,
            'title' => $title,
            'message' => $message,
            'position' => $position,
        ]);

        session()->put('notify', $notices);
    }
}

if (!function_exists('uploaded_path')) {
    /**
     * Get uploaded file from storage
     *
     * @param string $filename
     * @return string
     */
    function uploaded_path(string $filename): string
    {
        return storage_path('/../public/storage/' . $filename);
    }
}

if (!function_exists('idr')) {
    /**
     * Format currency idr format
     *
     * @param string|int $bill
     * @return string
     */
    function idr($bill = 0): string
    {
        return "Rp " . number_format((float)$bill, 0, ",", ".");
    }
}

if (!function_exists('active')) {
    /**
     * Set active url
     *
     * @param  string|array $url
     * @return string
     */
    function active($url, string $active = 'active'): string
    {
        return call_user_func_array('Request::is', (array) $url) ? $active : '';
    }
}

if (!function_exists('notify')) {
    /**
     * Notification
     *
     * @param  string $type
     * @param  string $title
     * @param  string $description
     * @return void
     */
    function notify(string $type, string $title, string $description): void
    {
        $notices = session()->get('notify');
        if (!is_array($notices)) {
            $notices = [];
        }

        array_push($notices, [
            'type' => $type,
            'title' => $title,
            'description' => $description,
        ]);

        session()->put('notify', $notices);
    }
}

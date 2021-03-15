<?php

if (!function_exists('is_active')) {
    /**
     * Set active url
     *
     * @param  string|array $url
     * @return array
     */
    function is_active($url): array
    {
        $active = [
            'status' => true,
            'class'  => 'flex items-center px-6 py-2 mt-1 text-gray-100 duration-200 bg-gray-600 bg-opacity-25 border-l-4 border-gray-100',
        ];

        $in_active = [
            'status' => false,
            'class'  => 'flex items-center px-6 py-2 mt-1 text-gray-500 duration-200 border-l-4 border-gray-900 hover:bg-gray-600 hover:bg-opacity-25 hover:border-l-4 hover:border-gray-100 hover:text-gray-100',
        ];

        return call_user_func_array('Request::is', (array) $url) ? $active : $in_active;
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

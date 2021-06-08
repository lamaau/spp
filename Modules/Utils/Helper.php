<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

if (!function_exists('put_env')) {
    /**
     * Replace env
     *
     * @see https://stackoverflow.com/a/52548022/7980381
     * 
     * @param string $key
     * @param string|null $value
     * @return void
     */
    function put_env(string $key, ?string $value)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        $str .= "\n"; // In case the searched variable is in the last line without \n
        $keyPosition = strpos($str, "{$key}=");

        $endOfLinePosition = strpos($str, PHP_EOL, $keyPosition);
        $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
        $str = str_replace($oldLine, "{$key}={$value}", $str);
        $str = substr($str, 0, -1);

        $fp = fopen($envFile, 'w');
        fwrite($fp, $str);
        fclose($fp);
    }
}

if (!function_exists('clean_currency_format')) {
    /**
     * Clean currency from number format
     *
     * @param integer|string $currency
     * @return integer
     */
    function clean_currency_format($currency): int
    {
        return (int)str_replace('.', '', $currency);
    }
}

if (!function_exists('generate_document_name')) {
    /**
     * Generate file name
     *
     * @param object $file
     * @param string $name
     * @param string $location
     * @return string
     */
    function generate_document_name(string $ext, string $name, string $location = 'uploads'): string
    {
        $path = $location . '/' . $name . '.' . $ext;
        $exists = Storage::disk(config('filesystem.default'))->exists($path);

        if (!$exists) {
            return $name . '.' . $ext;
        } else {
            $i = 1;
            while (Storage::disk(config('filesystem.default'))->exists(
                $location . '/' . $name . '_' . $i . '.' . $ext
            )) $i++;

            return $name . '_' . $i . '.' . $ext;
        }
    }
}

if (!function_exists('document_filename')) {
    /**
     * Get formated documents filename
     *
     * @param string $filename
     * @return string
     */
    function document_filename(string $filename): string
    {
        return substr($filename, strpos($filename, "__") + 2);
    }
}

if (!function_exists('create_date')) {
    /**
     * Create date
     *
     * @param  string $month
     * @return string
     */
    function create_date($month): string
    {
        $year = date('Y');
        return "$year-" . str_pad($month, 2, "0", STR_PAD_LEFT) . "-1";
    }
}

if (!function_exists('format_date')) {
    /**
     * Convert readable date
     *
     * @param  string $date
     * @return string
     */
    function format_date($date, $format = 'd F Y'): string
    {
        return Carbon::parse($date)->translatedFormat($format);
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

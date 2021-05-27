<?php

namespace App\Regional;

use Illuminate\Support\Facades\Http;

abstract class Endpoint
{
    public $endpoint = 'http://rizkhal.github.io/api-wilayah-indonesia/api/';

    public function get(string $uri)
    {
        try {
            $response = Http::get($this->endpoint . "{$uri}.json");

            if ($response->successful()) {
                return (array)json_decode($response->body());
            }

            return $response->status();
        } catch (\Exception $e) {
            return $e;
        }
    }
}

<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

trait Regional
{
    /** @var null|string */
    public $province;
    public $city;
    public $district;
    public $subdistrict;

    /** @var null|array */
    public $provinces;
    public $cities;
    public $districts;
    public $subdistricts;

    public string $endpoint = 'http://rizkhal.github.io/api-wilayah-indonesia/api/';

    public function updatedProvince(int $province)
    {
        $this->cities = [];
        $this->districts = [];
        $this->subdistricts = [];
        $this->cities = $this->getRegional("regencies/{$province}");
    }

    public function updatedCity(int $city)
    {
        $this->districts = [];
        $this->subdistricts = [];
        $this->districts = $this->getRegional("districts/{$city}");
    }

    public function updatedDistrict(int $district)
    {
        $this->subdistricts = [];
        $this->subdistricts = $this->getRegional("villages/{$district}");
    }

    protected function getRegional(string $key)
    {
        $response = Http::get("{$this->endpoint}/{$key}.json");

        if (!Cache::has($key)) {
            $response = Http::get("{$this->endpoint}/{$key}.json");

            if ($response->ok() && $response->status() === Response::HTTP_OK && $response->successful()) {
                $data = Cache::rememberForever($key, function () use ($response) {
                    return $response->json();
                });
            }
        }

        if (Cache::has($key)) {
            return Cache::get($key);
        }

        Cache::forget($key);
        if ($response->status() >= 500) {
            throw new \Exception("
                Server error when fetching from api: 
            " . $this->endpoint, 1);
        }
    }
}

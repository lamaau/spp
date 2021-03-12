<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Client\RequestException;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class TerritoryController extends Controller
{
    /**
     * Get the provinces
     *
     * @return Response
     */
    public function provinces()
    {
        return $this->call('provinces');
    }

    /**
     * Get all of cities where province
     *
     * @param string $id province id
     * @return Response
     */
    public function cities(string $id)
    {
        return $this->call("regencies/{$id}");
    }

    /**
     * Get all of districts where city
     *
     * @param string $id city id
     * @return Response
     */
    public function districts(string $id)
    {
        return $this->call("districts/{$id}");
    }

    /**
     * Get all of sub districts where district
     *
     * @param string $id district id
     * @return Response
     */
    public function sub_districts(string $id)
    {
        return $this->call("villages/{$id}");
    }

    /**
     * Getting indonesia territory
     *
     * @param  string $filename
     * @return array
     */
    protected function call(string $filename)
    {
        try {
            $response = Http::get("https://emsifa.github.io/api-wilayah-indonesia/api/{$filename}.json");

            if ($response->failed()) {
                return response([
                    'success' => false,
                    'message' => $response->throw(),
                ], 500);
            }

            return $response->json();
        } catch (RequestException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], $e->getCode());
        }
    }
}

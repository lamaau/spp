<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\JsonResponse;
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
     * Get the cities
     *
     * @return Response
     */
    public function cities(string $id)
    {
        return $this->call("regencies/{$id}");
    }

    /**
     * Get the districts
     *
     * @return Response
     */
    public function districts(string $id)
    {
        return $this->call("districts/{$id}");
    }

    /**
     * Get the sub districts
     *
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

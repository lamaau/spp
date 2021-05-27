<?php

namespace App\Regional;

use App\Regional\Endpoint;

class Regional extends Endpoint
{
    public function provinces()
    {
        return $this->get('provinces');
    }

    public function city(int $id)
    {
        return $this->get("regencies/{$id}");
    }

    public function district(int $id)
    {
        return $this->get("districts/{$id}");
    }

    public function subdistrict(int $id)
    {
        return $this->get("villages/{$id}");
    }
}

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

    public function findProvince(string $id)
    {
        return $this->get("province/{$id}");
    }

    public function findCity(string $id)
    {
        return $this->get("regency/{$id}");
    }

    public function findDistrict($id)
    {
        return $this->get("district/{$id}");
    }

    public function findSubDistrict($id)
    {
        return $this->get("village/{$id}");
    }
}

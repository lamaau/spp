<?php

namespace Modules\Master\Database\Factories;

use Illuminate\Support\Str;
use Modules\Master\Entities\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Master\Entities\Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'name' => $this->faker->firstName(),
            'code' => $this->faker->numerify('##########'),
            'tenant_id' => Tenant::inRandomOrder()->first()->id
        ];
    }
}

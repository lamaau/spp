<?php

namespace Modules\GoenDataMaster\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\GoenDataMaster\Entities\Level;

class LevelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Level::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->buildingNumber,
            'name' => $this->faker->name,
            'description' => $this->faker->text,
        ];
    }
}

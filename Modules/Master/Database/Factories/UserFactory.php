<?php

namespace Modules\Master\Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Master\Entities\User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->firstName(),
            'email' => $this->faker->unique()->email,
            'password' => Str::random(8)
        ];
    }
}

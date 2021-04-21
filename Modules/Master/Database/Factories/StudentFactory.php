<?php

namespace Modules\Master\Database\Factories;

use Illuminate\Support\Arr;
use Modules\Master\Constants\Sex;
use Modules\Master\Entities\Tenant;
use Modules\Master\Constants\Religion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Master\Entities\Room;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Master\Entities\Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'nisn' => $this->faker->numerify('##########'),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber,
            'religion' => array_rand(Religion::labels()),
            'status' => true,
            'sex' => array_rand(Sex::labels()),
            'room_id' => Room::inRandomOrder()->distinct()->first()->id,
            'tenant_id' => Tenant::inRandomOrder()->first()->id
        ];
    }
}

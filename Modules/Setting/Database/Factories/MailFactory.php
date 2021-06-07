<?php

namespace Modules\Setting\Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Setting\Entities\Mail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),
            'host' => 'smtp',
            'port' => '2525',
            'driver' => 'pusher',
            'username' => $this->faker->userName,
            'password' => Str::random(8),
            'from_name' => $this->faker->userName,
            'from_address' => $this->faker->unique()->email,
        ];
    }
}

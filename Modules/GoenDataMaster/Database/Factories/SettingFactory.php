<?php

namespace Modules\GoenDataMaster\Database\Factories;

use App\Constants\SchoolLevel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\GoenDataMaster\Entities\Setting;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'             => $this->faker->text,
            'email'            => $this->faker->unique()->safeEmail,
            'phone'            => $this->faker->phoneNumber,
            'fax'              => $this->faker->bankAccountNumber,
            'code'             => Str::random(10),
            'level'            => rand(1, 3),
            'principal'        => $this->faker->name,
            'principal_number' => $this->faker->bankAccountNumber,
            'province'         => 82,
            'city'             => 8271,
            'district'         => 8271030,
            'sub_district'     => 8271030012,
            'detail_address'   => $this->faker->text,
            'created_by'       => Str::uuid(),
            'expired_at'       => $this->faker->dateTimeBetween('now', '+30 years'),
        ];
    }
}

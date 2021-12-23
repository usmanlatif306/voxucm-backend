<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Did;
use Illuminate\Database\Eloquent\Factories\Factory;

class DidFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Did::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'city_id' => City::all()->random()->id,
            'dialing_code' => $this->faker->unique()->numberBetween(100, 2000),
            'price' => $this->faker->numberBetween(20, 50),
            'status' => false,
        ];
    }
}

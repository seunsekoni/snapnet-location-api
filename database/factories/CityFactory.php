<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'country_id' => $this->faker
        ];
    }

    /**
     * Make the country_id id dynamic.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function state_id($id)
    {
        return $this->state(function (array $attributes) use ($id) {
            return [
                'state_id' => $id,
            ];
        });
    }
}

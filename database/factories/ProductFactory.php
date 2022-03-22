<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(4),
            'marker' => $this->faker->sentence(10),
            'category' => $this->faker->sentence(15),
            'prize' => $this->faker->numberBetween(20,100),
            'desc' => $this->faker->sentence(10),
            'quantify' => $this->faker->numberBetween(1,5),
        ];
    }
}

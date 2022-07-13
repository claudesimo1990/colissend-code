<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'referenznumber' => $this->faker->unique()->numberBetween(100, 100000),
            'message' => $this->faker->realText(100),
        ];
    }
}

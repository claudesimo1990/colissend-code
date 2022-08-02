<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['name' => "string", 'description' => "array|string", 'image' => "string", 'slug' => "string", 'price' => "int", 'active' => "bool"])] public function definition(): array
    {
        $name = $this->faker->sentence();

        return [
            'name' => $name,
            'description' => $this->faker->sentences(rand(2, 5), true),
            'image' => $this->faker->imageUrl(),
            'slug' => Str::slug($name),
            'price' => rand(500, 10000),
            'active' => $this->faker->boolean(80)
        ];
    }
}

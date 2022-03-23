<?php

namespace Database\Factories;

use App\Models\Pub;
use Illuminate\Database\Eloquent\Factories\Factory;

class PubFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pub::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $images = ['news-1.jpg', 'news-2.jpg', 'news-3.jpg', 'news-4.jpg', 'news-5.jpg'];

        $image = $images[rand(0, 3)];

        return [
            'title' => $this->faker->name,
            'content' => $this->faker->text(100),
            'link' => $this->faker->url,
            'image' => $image,
        ];
    }
}

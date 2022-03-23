<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $object =
            [
                [['name' => 'envelop'], ['value' => false]],
                [['name' => 'telephone'], ['value' => false]],
                [['name' => 'computer'], ['value' => false]],
                [['name' => 'bags'], ['value' => false]],
                [['name' => 'others'], ['value' => false]],
            ];

        return
            [
            'user_id' => 1,
            'type' => 'TRAVEL',
            'name' => $this->faker->name,
            'from' => $this->faker->city,
            'to' => $this->faker->city,
            'dateFrom' => $this->faker->dateTimeBetween('now', '+30 years'),
            'dateTo' => $this->faker->dateTimeBetween('now', '+30 years'),
            'content' => $this->faker->paragraphs(1, true),
            'kilo' => $this->faker->numberBetween(0, 20),
            'price' => $this->faker->numberBetween(10, 50),
            'quantity' => $this->faker->numberBetween(10, 50),
            'slug' => $this->faker->slug(15),
            'company' => 'Air France',
            'objects' => utf8_encode(serialize($object)),
            //'ticket' => $this->faker->imageUrl(640, 480),
            'status' => 'PROGRESS',
            ];
    }
}

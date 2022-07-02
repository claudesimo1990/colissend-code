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
        $type = ['TRAVEL', 'PACKS'][rand(0, 1)];
        $cat = ['Electronique', 'Courrier', 'Bagages'];

        if ($type == 'PACKS') {
            $object = [[
                'id' => rand(1, 3),
                'name' => $this->faker->name,
                'type' => $cat[rand(0, 2)],
                'quantity' => 10,
                'price' => 10
            ],[
                'id' => rand(1, 3),
                'name' => $this->faker->name,
                'type' => $cat[rand(0, 2)],
                'quantity' => 3,
                'price' => 5
            ]];
        } else {
            $object = ['courrier' => [
                'status' => true,
                'number' => 5,
                'price' => 10
            ]];
        }

        $countries = ['Yaounde', 'Douala', 'Berlin', 'Dusseldorf', 'Paris'];
        $from = $countries[rand(0, 4)];
        $newArray = array_filter($countries, function ($item) use($from) {
            return $item != $from;
        },  ARRAY_FILTER_USE_KEY);

        $to = $newArray[rand(0, (count($newArray)) - 1)];

        return
            [
            'type' => $type,
            'name' => $this->faker->name,
            'from' => $from,
            'to' => $to,
            'referenznumber' => rand(1000546456, 34985309475),
            'dateFrom' => $this->faker->dateTimeBetween('now', '+30 years'),
            'dateTo' => $this->faker->dateTimeBetween('now', '+30 years'),
            'content' => $this->faker->paragraphs(1, true),
            'kilo' => $this->faker->numberBetween(0, 20),
            'price' => $this->faker->numberBetween(1000, 2000),
            'quantity' => $this->faker->numberBetween(10, 50),
            'slug' => $this->faker->slug(15),
            'company' => 'Air France',
            'objects' => json_encode($object),
            //'ticket' => $this->faker->imageUrl(640, 480),
            'status' => 'ACCEPTED',
            ];
    }
}

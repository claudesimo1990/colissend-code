<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
//        $images = ['news-1.jpg', 'news-2.jpg', 'news-3.jpg', 'news-4.jpg', 'news-5.jpg'];
//        $image = $images[rand(0, 3)];

        return [
            'full_name' => $this->faker->firstName . '' .$this->faker->lastName,
            'avatar' => 'default.jpg',
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'street' => $this->faker->streetName,
            'phone' => $this->faker->phoneNumber,
            'birthday' => $this->faker->dateTime,
            'about' => $this->faker->sentence(60),
            'facebook' => $this->faker->name,
            'instagram' => $this->faker->name,
            'linkedin' => $this->faker->name,
        ];
    }
}

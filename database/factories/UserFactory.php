<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['firstname' => "string", 'lastname' => "string", 'email' => "string", 'email_verified_at' => "\Illuminate\Support\Carbon", 'last_connexion' => "\DateTime", 'password' => "string", 'remember_token' => "null"])] public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->email,
            'email_verified_at' => now(),
            'last_connexion' => now()->toDateTime(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => null,
        ];
    }
}

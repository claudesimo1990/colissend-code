<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Message;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Pub;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
/*        User::factory(1000)->create()->each(function ($user) {
            Post::factory(1)->create([
                'user_id' => $user->id
            ]);

            Post::factory(2)->create([
                'user_id' => $user->id
            ]);

            Profile::factory(1)->create([
                'user_id' => $user->id,
                'avatar' => 'default.png',
            ]);

            Message::factory(5)->create([
                'from' => rand(1, 10),
                'to' => $user->id,
            ]);
        });*/

        User::factory(1)->create([
            'email' => 'claudesimo1990@gmail.com',
        ]);

        Profile::factory(1)->create([
            'user_id' => 1,
            'avatar' => 'default.png',
        ]);

        Post::factory(4)->create([
            'user_id' => 1
        ]);

        Pub::factory(4)->create();

        Admin::factory(1)->create();
    }
}

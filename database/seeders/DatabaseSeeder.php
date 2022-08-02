<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\Message;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Pub;
use App\Models\Reservation;
use App\Models\User;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use JetBrains\PhpStorm\ArrayShape;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class DatabaseSeeder extends Seeder
{

    public function __construct(private Generator $faker)
    {
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
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

/*        User::factory(1)->create([
            'email' => 'claudesimo1990@gmail.com',
        ]);

        Profile::factory(1)->create([
            'user_id' => 1,
            'avatar' => 'default.png',
        ]);

        Post::factory(4)->create([
            'user_id' => 1
        ]);

        Pub::factory(4)->create();*/

//        $avatars = [1 => '/images/testimonials/paris.jpeg', 2 => '/images/testimonials/paris-2.jpeg', 3 => '/images/testimonials/paris-3.jpeg'];
//
//        User::factory(3)->create()->each(function (User $user) use($avatars) {
//
//            Pub::factory(1)->create([
//                'user_id' => $user->id
//            ]);
//
//            $fileAddress = base_path(). '/public'.$avatars[$user->id];
//
//            $file = new UploadedFile($fileAddress, 'avatar');
//
//            try {
//                $user->addMedia($file)->toMediaCollection('avatar');
//            } catch (FileDoesNotExist|FileIsTooBig $e) {
//            }
//
//            Post::factory(1)->create([
//                'user_id' => $user->id
//            ]);
//        });

        //Admin::factory(1)->create();

/*        for ($i = 1; $i <= 3; $i++) {

            $n = 1;
            while( in_array( ($n = mt_rand(1,3)), array($i)));

            $from = $i;
            $to = $n;

            if ($from != $to) {
                Message::factory(10)->create([
                    'from' => $from,
                    'to' => $to,
                ]);
            }
        }*/
//        $images = [1 => '/images/testimonials/paris.jpeg', 2 => '/images/testimonials/paris-2.jpeg', 3 => '/images/testimonials/paris-3.jpeg'];
//
//        Blog::factory(3)->create()->each(callback: function (Blog $blog) use($images){
//
//            $fileAddress = base_path(). '/public'.$images[$blog->id];
//
//            $file = new UploadedFile($fileAddress, 'blog');
//
//            try {
//                $blog->addMedia($file)->toMediaCollection('blog');
//            } catch (FileDoesNotExist|FileIsTooBig $e) {
//            }
//        });
//
//        $post = Post::first();
//
//        $r =  Reservation::factory(5)->make([
//            'user_id' => Auth::id(),
//            'message' => $this->faker->realText(100),
//            'kilo' => $post->kilo,
//            'price' => $post->price,
//            'referenznumber' => uniqid(),
//            'status' => 'DRAFT',
//            'paid' => false,
//            'objects' => json_encode($post->objects)
//        ]);
//
//        dd($r->toArray());

//        Post::all()->each(function ($post) {
//            Reservation::factory(5)->create([
//                'user_id' => User::find(4)->id,
//                'post_id' => $post->id,
//                'kilo' => $post->kilo,
//                'price' => $post->price,
//                'status' => 'DRAFT',
//                'paid' => false,
//                'objects' => json_encode($post->objects)
//            ]);
//        });

        User::factory()
            ->count(10)
            ->has(
                Order::factory()
                    ->count(3)
                    ->hasAttached(
                        Product::factory()->count(5),
                        ['price' => rand(100, 500), 'quantity' => rand(1, 3)]
                    )
            )
            ->create();

    }
}

<?php

namespace Database\Seeders;

use App\Models\Follows;
use App\Models\Like;
use Illuminate\Support\Str;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        for ($i = 0; $i < 10; $i++) {
            Post::create([
                'judul' => 'Judul ' . ($i + 1),
                'kode_post' => Str::random(10),
                'image' => 'https://source.unsplash.com/random',
                'deskripsi' => fake()->sentence(),
                'user_id' => rand(1, 10) // Pastikan ada user dengan id 1 sampai 10
            ]);
        }

        Like::create([
            'user_id' => 1,
            'post_id' => 1,
        ]);

        Like::create([
            'user_id' => 2,
            'post_id' => 2,
        ]);

        Like::create([
            'user_id' => 3,
            'post_id' => 3,
        ]);

        $follows = [
            ['follower_id' => 1, 'followed_id' => 2],
            ['follower_id' => 1, 'followed_id' => 3],
            ['follower_id' => 2, 'followed_id' => 3],
            ['follower_id' => 2, 'followed_id' => 4],
            ['follower_id' => 3, 'followed_id' => 4],
            ['follower_id' => 3, 'followed_id' => 5],
            ['follower_id' => 4, 'followed_id' => 5],
            ['follower_id' => 5, 'followed_id' => 1],
        ];

        Follows::insert($follows);
         // Memanggil seeder BookmarkSeeder
         $this->call([
            BookmarkSeeder::class,
            CommentSeeder::class,
        ]);
    }
}

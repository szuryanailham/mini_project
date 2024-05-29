<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PostSeeder;



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
         // Memanggil seeder BookmarkSeeder
         $this->call(BookmarkSeeder::class);
    }
}

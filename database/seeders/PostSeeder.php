<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Post::create([
                'kode_post' => Str::random(10),
                'img' => 'https://source.unsplash.com/user/wsanter',
                'deskripsi' => $faker->paragraph,
                'kode_user' => rand(1, 10) // Pastikan ada user dengan id 1 sampai 10
            ]);
    }
}
}

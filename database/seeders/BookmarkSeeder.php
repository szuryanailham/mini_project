<?php

namespace Database\Seeders;

use App\Models\Bookmark;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Ambil 5 pengguna acak
         $users = User::inRandomOrder()->limit(5)->get();

         // Ambil 5 postingan acak
         $posts = Post::inRandomOrder()->limit(5)->get();
 
         // Buat data dummy untuk setiap pengguna
         foreach ($users as $user) {
             // Ambil satu postingan acak untuk setiap pengguna
             $post = $posts->random();
 
             // Tautkan postingan dengan pengguna saat ini
             Bookmark::create([
                 'user_id' => $user->id,
                 'post_id' => $post->id,
             ]);
         }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Pastikan untuk mengimpor DB facade
use Carbon\Carbon; // Untuk mendapatkan tanggal dan waktu saat ini

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            [
                'post_id' => 1,
                'user_id' => 2,
                'content' => 'This is the first comment.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_id' => 1,
                'user_id' => 3,
                'content' => 'This is the second comment.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_id' => 2,
                'user_id' => 1,
                'content' => 'This is the third comment.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_id' => 2,
                'user_id' => 4,
                'content' => 'This is the fourth comment.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'post_id' => 3,
                'user_id' => 1,
                'content' => 'This is the fifth comment.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

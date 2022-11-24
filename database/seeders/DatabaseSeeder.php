<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        User::factory()->unverified()->create([
            'email' => 'harvicapino22@gmail.com',
            'username' => 'harvicapino22',
        ]);

        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(ReplySeeder::class);
    }
}

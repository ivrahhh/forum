<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->has(
            Post::factory()
                ->hasAttached(Tags::factory()
                    ->count(3))
                ->count(3)
        )->create();
    }
}

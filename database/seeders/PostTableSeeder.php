<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p = new Post;
        $p->title = 'Arsenal vs Everton';
        $p->user_id = 2;
        $p->image = fake()->imageUrl(100, 100);
        $p->save();

    


        Post::factory()->count(5)->create();
    }
}

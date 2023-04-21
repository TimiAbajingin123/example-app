<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $r = new Review;
        $r->content = "nice post";
        $r->post_id = 1;
        $r->user_id = 1;
        $r->save();

        Review::factory()->count(5)->create();
    }
}

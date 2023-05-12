<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c = new Comment;
        $c->user_id = 1;
        //$c->post_id = 1;
        $c->content = 'great match';
        $c->commentable_id = 1;
        $c->commentable_type = 'App\Models\Post';
        $c->save();

        Comment::factory()->count(50)->create();
    }
}

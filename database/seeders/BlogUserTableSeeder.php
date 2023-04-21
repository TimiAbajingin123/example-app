<?php

namespace Database\Seeders;

use App\Models\BlogUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $b = new BlogUser;
        $b->name = 'john';
        $b->role_id = 1;
        $b->save();


        BlogUser::factory()->count(20)->create();
    }
}

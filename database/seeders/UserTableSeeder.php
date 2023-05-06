<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $u = new User;
        $u->name = 'Timi Admin';
        $u->role_id = 1;
        $u->password = 'ChrolloLucifer123';
        $u->email = 'timi@gmail.com';
        $u->save();

        $u = new User;
        $u->name = 'Timi';
        $u->role_id = 2;
        $u->password = 'ChrolloLucifer123';
        $u->email = 'timiabajingin@gmail.com';
        $u->save();


        User::factory()->count(20)->create();
    }
}

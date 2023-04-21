<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $r = new Role;
        $r -> id = 1;
        $r->role_name = 'admin';
        $r->save();

        Role::factory()->count(1)->create();
    }
}

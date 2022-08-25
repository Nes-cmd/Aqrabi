<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Administrator', 'slug' => 'admin']);
       
        Role::create(['name' => 'Content creator', 'slug' => 'content-creator']);
        Role::create(['name' => 'Customer', 'slug' => 'customer']);
    }
}

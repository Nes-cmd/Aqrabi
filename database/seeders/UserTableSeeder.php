<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'fullname' => 'Admin',
            'phone' => '0940678725',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$HQA6uxXGTAZPJityLRZqf.oZXXZ.N/a1FHmTsC6IEKc75C5maGuBG', //password
            'email_verified_at' => '2021-12-30 19:59:40',
        ]);
        $role1 = Role::where('slug', 'admin')->first()->id;
        $user1->roles()->attach($role1, ['status' => 'approved']);

        $user2 = User::create([
            'fullname' => 'Supplier man',
            'phone' => '0940678345',
            'email' => 'supplier@supplier.com',
            'password' => '$2y$10$HQA6uxXGTAZPJityLRZqf.oZXXZ.N/a1FHmTsC6IEKc75C5maGuBG', //password
            'email_verified_at' => '2021-12-30 19:59:40',
        ]);
        $role2 = Role::where('slug', 'supplier')->first()->id;
        $user2->roles()->attach($role2,['status' => 'approved']);

        $user3 = User::create([
            'fullname' => 'Some Customer',
            'phone' => '0956567657',
            'email' => 'customer@customer.com',
            'password' => Hash::make('password'),//'$2y$10$HQA6uxXGTAZPJityLRZqf.oZXXZ.N/a1FHmTsC6IEKc75C5maGuBG', //password
            'email_verified_at' => '2021-12-30 19:59:40',
        ]);
        $role3 = Role::where('slug', 'customer')->first()->id;
        $user3->roles()->attach($role3);

      
    }
}

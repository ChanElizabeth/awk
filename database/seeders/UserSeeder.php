<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
            ['name' => "Admin",
            'email' => "admin@example.com",
            'password' => Bcrypt("adminadmin"),
            'phone' => '08572034892',
            'role_id'  => 1],
            ['name' => "Partner",
            'email' => "partner@example.com",
            'password' => Bcrypt("partnerpartner"),
            'phone' => '08782987001',
            'role_id'  => 4]
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\FeeByPartner;
use App\Models\FeeForPartner;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            FeeForPartnerSeeder::class,
            FeeByPartnerSeeder::class,
            KodeUnikOrderSeeder::class
        ]);
    }
}

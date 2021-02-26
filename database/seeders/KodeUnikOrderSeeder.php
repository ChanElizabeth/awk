<?php

namespace Database\Seeders;

use App\Models\KodeUnikOrder;
use Illuminate\Database\Seeder;

class KodeUnikOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 999; $i++) {
            KodeUnikOrder::create([
                'kode'      =>  $i,
                'status'    =>  0
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\FeeForPartner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeeForPartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = json_decode(file_get_contents(public_path('json/banks.json')));
        foreach ($banks as $key => $bank) {
            FeeForPartner::create([
                'id'    => $key+1,
                'user_id' => 1,
                'fee'   => 0,
                'bank_code' => $bank->bank_code,
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time())
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\FeeByPartner;
use Illuminate\Database\Seeder;

class FeeByPartnerSeeder extends Seeder
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
            FeeByPartner::create([
                'id'    => $key+1,
                'user_id' => 1,
                'fee'   => 0,
                'bank_code' => $bank->bank_code,
                'bank' => $bank->name,
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time())
            ]);
        }
    }
}

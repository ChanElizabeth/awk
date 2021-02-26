<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\FlipService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlipController extends Controller
{
    protected $flipService;

    public function __construct(FlipService $flipService)
    {
        $this->flipService = $flipService;
    }

    public function balance ()
    {
        return $this->flipService->get('general/balance');
    }

    public function banks ()
    {
        return response()->json( json_decode($this->flipService->get('general/banks')) );
    }

    public function operational ()
    {
        return $this->flipService->get('general/operational');
    }

    public function maintenance ()
    {
        return $this->flipService->get('general/maintenance');
    }

    public function get_city ()
    {
        return $this->flipService->get('disbursement/city-list');
    }

    public function bank_inquiry (Request $request)
    {
        $data = "account_number=".$request->account_number."&bank_code=".$request->bank_code;
        return $this->flipService->post('disbursement/bank-account-inquiry', $data);
    }

    public function indempotent (Request $request)
    {
        return $this->flipService->indempotent('disbursement', $request);
    }

    public function get_disbursement($transaction_id)
    {
        return $this->flipService->get("disbursement/".$transaction_id);
    }

    public function get_all_disbursement ()
    {
        return $this->flipService->get("disbursement?pagination=5");
    }

    public function callback_disbursement(Request $request)
    {
        DB::table('transactions')->where('flip_id', $request['id'])->update(['status'=>$request['status']]);
        return $request;
    }
}

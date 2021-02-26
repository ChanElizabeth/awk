<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FeeForPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeeForPartnerController extends Controller
{
    public function index ($id){
        $response=FeeForPartner::where('user_id', $id)->get();

        return view('backend.fee_partner.index', compact('response'));
    }

    public function create ($id){
        $path=public_path() . "/json/banks.json";
        $json=json_decode(file_get_contents($path));

        return view('backend.fee_partner.create', compact('json'));
    }

    public function store (Request $request){
        $temp = FeeForPartner::where('user_id', $request->input('id'))->where('bank_code', $request->input('bank_code'))->first();

        if ($temp == NULL) {
            $fee = new FeeForPartner();
            $fee->fee = str_replace(',','',$request->input('fee'));
            $fee->bank_code = $request->input('bank_code');
            $fee->user_id = $request->input('id');

            $fee->save();

            return redirect()->route('dashboard.user.admin.fee.index', $request->input('id'))->with('success', 'Fee berhasil dibuat');
        }

        return redirect()->route('dashboard.user.admin.fee.index', $request->input('id'))->with('error', 'Fee gagal dibuat');
    }

    public function edit(){
        $id = request()->route('id');
        $fee_id = request()->route('fee_id');

        $response = FeeForPartner::where('user_id', $id)->where('id', $fee_id)->first();

        return view('backend.fee_partner.edit', compact('response'));
    }

    public function update(Request $request){
        $id = request()->route('id');
        $fee_id = request()->route('fee_id');
        $temp = FeeForPartner::where('user_id', $id)->where('id', $fee_id)->first();

        $temp->fee = str_replace(',','',$request->fee);

        $temp->save();

        return redirect()->route('dashboard.user.admin.fee.index', $id)->with('success', 'Fee berhasil di ubah');
    }
}

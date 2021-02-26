<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FeeByPartner;
use App\Services\FeeByPartnerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeeByPartnerController extends Controller
{
    protected $service;

    public function __construct(FeeByPartnerService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $data['fee_partner'] = FeeByPartner::where('user_id', Auth::user()->id)->get();
        // return $data['fee_partner'];
        return view("backend.partner.feeByPartner.index", compact('data'));
    }

    public function edit($id)
    {
        $data['fee'] = FeeByPartner::where('user_id', Auth::user()->id)->where('id', $id)->first();
        return view("backend.partner.feeByPartner.edit", compact('data'));
    }

    public function update(Request $request, $id)
    {
        FeeByPartner::where('user_id', Auth::user()->id)->where('id', $id)->update([
            'fee' => str_replace(',','',$request->fee)
        ]);
        return redirect()->route('dashboard.partner.feeByPartner.index')->with('success', 'Fee berhasil diperbarui');
    }
}

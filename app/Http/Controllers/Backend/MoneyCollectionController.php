<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TransactionMoneyCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoneyCollectionController extends Controller
{
    public function index (){
        $response = TransactionMoneyCollection::all();

        return view('backend.money_collection.index', compact('response'));
    }

    public function show ($id){
        $response = TransactionMoneyCollection::where('transaction_id', $id)->first();

        return view('backend.money_collection.detail', compact('response'));
    }

    public function collect (Request $request){
        $temp = TransactionMoneyCollection::where('transaction_id', $request->transaction_id)->first();
        $temp->admin_id     = Auth::user()->id;
        $temp->status       = 1;
        $temp->save();

        return redirect()->route('dashboard.user.admin.money-collection.index')->with('success', 'Money successfully collected');
    }
}

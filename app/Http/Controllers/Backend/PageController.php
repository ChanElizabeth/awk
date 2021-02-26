<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionTransfer;
use App\Services\FlipService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{
    protected $flipService;

    public function __construct(FlipService $flipService)
    {
        $this->flipService = $flipService;
    }

    public function index()
    {
        $balance = $this->flipService->get('general/balance');
        $balance = json_decode($balance);

        $months=['01','02','03','04','05','06','07','08','09','10','11','12'];
        $transactions=[];
        $transactions_current=[];
        $current_month=date('m');
        $current_year=date('Y');

        if(Gate::allows('isAdmin', Auth::user())){
            $total_transaction = Transaction::all()->count();
            foreach ($months as $key=>$value) {
                $transactions[$key] = Transaction::whereMonth('created_at', '=', date($value))->count();
            }
            for ($i = 1; $i <= 31; $i++) {
                $transactions_current[] = Transaction::whereDate('created_at', '=', date($current_year.'-'.$current_month.'-'.$i))->count();
            }
            $pending = TransactionTransfer::where('status', 'PENDING')->count();
            $success = TransactionTransfer::where('status', 'DONE')->count();
            $failed = TransactionTransfer::where('status', 'CANCELLED')->count();
            $response = TransactionTransfer::all()->take(3);
        } else{
            foreach ($months as $key=>$value) {
                $transactions[$key] = TransactionTransfer::whereMonth('created_at', '=', date($value))->where('user_id', Auth::user()->id)->count();
            }
            for ($i = 1; $i <= 31; $i++) {
                $transactions_current[] = TransactionTransfer::whereDate('created_at', '=', date($current_year.'-'.$current_month.'-'.$i))->where('user_id', Auth::user()->id)->count();
            }
            $total_transaction = TransactionTransfer::where('id', Auth::user()->id)->count();
            $pending = TransactionTransfer::where([['status', '=', 'PENDING'], ['user_id', '=', Auth::user()->id]])->count();
            $success = TransactionTransfer::where([['status', '=', 'DONE'], ['user_id', '=', Auth::user()->id]])->count();
            $failed = TransactionTransfer::where([['status', '=', 'CANCELLED'], ['user_id', '=', Auth::user()->id]])->count();
            $response = TransactionTransfer::where('user_id', Auth::user()->id)->take(3);
        }
        return view('backend.index', compact('response', 'balance', 'total_transaction', 'pending', 'success', 'failed'))
            ->with('transactions', json_encode($transactions, JSON_NUMERIC_CHECK))
            ->with('transactions_current', json_encode($transactions_current, JSON_NUMERIC_CHECK));
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\KodeUnikOrder;
use App\Models\Transaction;
use App\Models\TransactionOrder;
use App\Services\OrderService;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TransactionOrderController extends Controller
{
    protected $transactionService;
    protected $orderService;

    public function __construct(TransactionService $transactionService, OrderService $orderService)
    {
        $this->transactionService = $transactionService;
        $this->orderService = $orderService;
    }

    public function index()
    {
        $response   = array();
        if(Gate::allows('isAdmin', Auth::user())){
            $temp       = Transaction::where('type', 'ORDER')->get();
        } else {
            $temp       = Transaction::where('user_id', Auth::user()->id)->where('type', 'ORDER')->get();
        }
        foreach ($temp as $value) {
            $order = TransactionOrder::where('id_transaction', $value->transaction_id)->first();
            array_push($response, $order);
        }
        return view('backend.order.index', compact('response'));
    }

    public function detail($id)
    {
        $response = TransactionOrder::where('id_transaction', $id)->first();

        return view('backend.order.detail', compact('response'));
    }

    public function create()
    {
        $response1 = file_get_contents(public_path('json/banks.json'));
        $response1 = json_decode($response1);

        return view('backend.order.create', compact('response1'));
    }

    public function check(Request $request)
    {
        $temp                   =   new TransactionOrder();
        $temp->nominal          =   $request->input('nominal');
        $temp->bank_tujuan_code =   $request->input('bank_code');

        return view('backend.order.check', compact('temp'));
    }

    public function store(Request $request)
    {
        $key = $this->transactionService->generateTransactionId();

        $amount = str_replace(',','', $request->input('amount'));

        $transaction                    =   new Transaction();
        $transaction->transaction_id    =   $key;
        $transaction->type              =   "ORDER";
        $transaction->user_id           =   Auth::user()->id;

        $transaction->save();


        $data = [
            "bank_code" => $request->input('bank_code'),
            "amount" => $amount
        ];
        $data = json_encode($data);
        $temp = $this->orderService->post('localhost:3000/awankita/order', $data);
        $temp = json_decode($temp, true);
        $temp = $temp['result'];

        $order                   =   new TransactionOrder();
        $order->id_transaction   =   $key;
        $order->order_id         =   $this->transactionService->generateTransactionId();
        $order->bank_tujuan_code =   $request->input('bank_code');
        $order->bank_tujuan_rek  =   $temp['rekening'];

        $kode_unik = KodeUnikOrder::all();
        foreach ($kode_unik as $kode) {
            if ($kode->kode == $temp['kode_unik']){
                $order->kode_unik = $kode->kode;
                $order->nominal   = $amount + $kode->kode;
                $kode->status     = 1;
                $kode->save();
                break;
            }
        }

        $order->save();

        return redirect()->route('dashboard.partner.order.index')->with('success', 'order berhasil dibuat');
    }

    public function confirm(Request $request)
    {
        $id_transaction = $request->input('id_transaction');
        $time = date('Y-m-d H:i:s', time());

        $transaction = TransactionOrder::where('id_transaction', $id_transaction)->first();
        $transaction->verified_at = $time;

        $transaction->save();
        return redirect()->route('dashboard.partner.order.index')->with('success', 'Order berhasil di verify');
    }
}

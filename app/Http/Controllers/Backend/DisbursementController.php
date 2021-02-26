<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FeeByPartner;
use App\Models\FeeForPartner;
use App\Models\Transaction;
use App\Models\TransactionMoneyCollection;
use App\Models\TransactionTransfer;
use App\Models\User;
use App\Services\FlipService;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DisbursementController extends Controller
{
    protected $flipService;
    protected $transactionService;

    public function __construct(FlipService $flipService, TransactionService $transactionService)
    {
        $this->flipService = $flipService;
        $this->transactionService = $transactionService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isAdmin', Auth::user())) {
            $response1 = $this->flipService->get("disbursement?pagination=5");
            $response1 = json_decode($response1);
            $response1 = $response1->data;
            $current_page = 1;
            return view('backend.disbursement.index', compact('response1', 'current_page'));
        } else {
            $response1 = TransactionTransfer::where('user_id', Auth::user()->id)->get();
            $current_page = 1;
            return view('backend.disbursement.index', compact('response1', 'current_page'));
        }
    }

    public function changePage($current_page)
    {
        if (Gate::allows('isAdmin', Auth::user())) {
            $response1 = $this->flipService->get("disbursement?pagination=5&page=".$current_page);
            $response1 = json_decode($response1);
            if ($current_page > $response1->total_page)
            {
                $current_page -= 1;
            } elseif ($current_page == 0)
            {
                $current_page += 1;
            }
            $response1 = $response1->data;

            return view('backend.disbursement.index', compact('response1', 'current_page'));
        } else{
            return redirect()->route('dashboard.disbursement.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        // $response1 = $this->flipService->get("general/banks");\
        $response1 = file_get_contents(public_path('json/banks.json'));
        // $response2 = $this->flipService->get("disbursement/city-list");

        $response1 = json_decode($response1);
        // $response2 = json_decode($response2);

        return view('backend.disbursement.create', compact('response1'));
    }

    public function check (Request $request)
    {
        $data = "account_number=".$request->account_number."&bank_code=".$request->bank_code;
        $response1 = $this->flipService->post('disbursement/bank-account-inquiry', $data);
        $response1 = json_decode($response1, true);

        $fee_for_partner = FeeForPartner::where('user_id', Auth::user()->id)->where('bank_code', $request->bank_code)->first();
        if($fee_for_partner == NULL){
            $fee_for_partner = FeeForPartner::where('user_id', 1)->where('bank_code', $request->bank_code)->first();
        }
        $fee_by_partner = FeeByPartner::where('user_id', Auth::user()->id)->where('bank_code', $request->bank_code)->first();
        if($fee_by_partner == NULL){
            $fee_by_partner = FeeByPartner::where('user_id', 1)->where('bank_code', $request->bank_code)->first();
        }

        $amount = str_replace(',','',$request->amount) - $fee_for_partner->fee - $fee_by_partner->fee;
        $response2 = [
            "account_number" => $request->account_number,
            "bank_code" => $request->bank_code,
            "amount" => $amount,
            "remark" => $request->remark,
            "recipient_city" => $request->recipient_city
        ];
        // return $response2;
        return view('backend.disbursement.check', compact('response1', 'response2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $key = $this->transactionService->generateTransactionId();

        $transaction = new Transaction();
        $transaction->transaction_id        =   $key;
        $transaction->type                  =   "TRANSFER";
        $transaction->user_id               =   Auth::user()->id;

        $transaction->save();

        $transaction_transfer = new TransactionTransfer();
        $transaction_transfer->id_transaction    =   $key;
        $transaction_transfer->account_number    =   $request->input('account_number');
        $transaction_transfer->bank_code         =   $request->input('bank_code');
        $transaction_transfer->amount            =   str_replace(',','', $request->input('amount'));
        $transaction_transfer->remark            =   $request->input('remark');
        $transaction_transfer->user_id           =   Auth::user()->id;

        $transaction_transfer->save();

        $month=date('m');
        $day=date('d');
        $year=date('Y');
        $temp=TransactionMoneyCollection::whereDate('created_at', '=', date($year.'-'.$month.'-'.$day))->where('partner_id', Auth::user()->id)->first();
        $user = User::where('id', Auth::user()->id)->first();

        if ($user->partner_type == 1){
            if ($temp != NULL) {
                $amount=$temp->amount;
                if($user->limit > $amount +=  str_replace(',','', $request->input('amount'))){
                    $request->request->add(['idempotency_key'=>$key]);
                    $response = $this->flipService->indempotent('disbursement', $request);
                    $response = json_decode($response);

                    if(isset($response->status)){
                        $transaction_transfer->flip_id = $response->id;
                        $transaction_transfer->fee = $response->fee;
                        $transaction_transfer->status = $response->status;
                        $transaction_transfer->save();

                        $temp->amount+= str_replace(',','', $request->input('amount'));
                        $temp->save();

                        return redirect()->route('dashboard.disbursement.index')->with('success', 'Pembayaran berhasil dibuat');
                    } else{
                        $transaction_transfer->status = 'Gagal';
                        return redirect()->route('dashboard.disbursement.index')->with('error', 'Pembayaran gagal dilakukan, silahkan coba kembali');
                    }
                }
            } else {
                if($user->limit >  str_replace(',','', $request->input('amount'))){
                    $request->request->add(['idempotency_key'=>$key]);
                    $response = $this->flipService->indempotent('disbursement', $request);
                    $response = json_decode($response);

                    if(isset($response->status)){
                        $transaction_transfer->flip_id = $response->id;
                        $transaction_transfer->fee = $response->fee;
                        $transaction_transfer->status = $response->status;
                        $transaction_transfer->save();

                        $key_new = $this->transactionService->generateTransactionId();

                        $transaction_new = new Transaction();
                        $transaction_new->transaction_id        =   $key_new;
                        $transaction_new->type                  =   "COLLECTION";
                        $transaction_new->user_id               =   1;

                        $transaction_new->save();

                        $money_collection=new TransactionMoneyCollection();
                        $money_collection->id_transaction   =$key_new;
                        $money_collection->amount           = str_replace(',','', $request->input('amount'));
                        $money_collection->partner_id       =Auth::user()->id;

                        $money_collection->save();

                        return redirect()->route('dashboard.disbursement.index')->with('success', 'Pembayaran berhasil dibuat');
                    } else{
                        $transaction_transfer->status = 'GAGAL';
                        return redirect()->route('dashboard.disbursement.index')->with('error', 'Pembayaran gagal dilakukan, silahkan coba kembali');
                    }
                }
            }
        } else{
            $request->request->add(['idempotency_key'=>$key]);
            $response = $this->flipService->indempotent('disbursement', $request);
            $response = json_decode($response);

            if(isset($response->status)){
                $transaction_transfer->flip_id = $response->id;
                $transaction_transfer->fee = $response->fee;
                $transaction_transfer->status = $response->status;
                $transaction_transfer->save();

                return redirect()->route('dashboard.disbursement.index')->with('success', 'Pembayaran berhasil dibuat');
            } else{
                $transaction_transfer->status = 'Gagal';
                return redirect()->route('dashboard.disbursement.index')->with('error', 'Pembayaran gagal dilakukan, silahkan coba kembali');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = TransactionTransfer::where('id', $id)->first();
        return view('backend.disbursement.detail', compact('response'));
    }
}

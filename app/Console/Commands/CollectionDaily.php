<?php

namespace App\Console\Commands;

use App\Mail\CollectionMail;
use App\Models\TransactionMoneyCollection;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CollectionDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'collection:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to the partners who have not submitted their money collection';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('role_id', 4)->get();
        foreach ($users as $user){
            $month=date('m');
            $day=date('d');
            $year=date('Y');
            $money_collection = TransactionMoneyCollection::whereDate('created_at', '=', date($year.'-'.$month.'-'.$day))->where('partner_id', $user->id)->first();
            if ($money_collection != NULL) {
                $data = [
                    'user'  => $user->name,
                    'amount'   => $money_collection->amount
                ];
                Mail::to($user->email)->send(new CollectionMail($data));
            }
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'user_id',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactionMoneyCollection()
    {
        return $this->hasMany(TransactionMoneyCollection::class);
    }

    public function transactionTransfer()
    {
        return $this->hasMany(TransactionTransfer::class);
    }

    public function transactionOrder()
    {
        return $this->hasMany(TransactionOrder::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionTransfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaction',
        'account_number',
        'bank_code',
        'amount',
        'remark',
        'flip_id',
        'fee',
        'status',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function transaction()
    {
        return $this->belongsTo(transaction::class);
    }
}

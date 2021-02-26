<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaction',
        'order_id',
        'kode_unik',
        'bank_tujuan_code',
        'bank_tujuan_rek',
        'verified_at'
    ];

    public function transaction()
    {
        return $this->belongsTo(transaction::class);
    }
}

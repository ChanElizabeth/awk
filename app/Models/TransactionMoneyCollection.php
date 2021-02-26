<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionMoneyCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaction',
        'partner_id',
        'admin_id',
        'amount',
        'status',
        'notified'
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

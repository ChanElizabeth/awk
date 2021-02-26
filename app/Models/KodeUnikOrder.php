<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeUnikOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'status'
    ];

    public function transactionOrder()
    {
        return $this->hasMany(TransactionOrder::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeForPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fee',
        'bank_code'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}

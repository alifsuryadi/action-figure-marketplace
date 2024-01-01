<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'inscurance_price',
        'shipping_price',
        'total_price',
        'transaction_status',
        'code'
    ];


    protected $hidden = [
    ];


    public function user()
    {
        // Satu user satu transaction, tapi bisa melakukan banyak transaksi
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
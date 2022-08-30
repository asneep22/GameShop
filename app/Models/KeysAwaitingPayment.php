<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeysAwaitingPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        "order_id",
        "product_id",
        "key",
        "key_price",
    ];

    public function Product(){
        return $this->belongsTo(Product::class);
    }

    public function Order(){
        return $this->belongsTo(Order::class);
    }
}

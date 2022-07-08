<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class key extends Model
{
    use HasFactory;

    protected $fillable = [
         'key_price',
        'key',
        'product_id'
    ];

    public function product(){
        return $this->belongsTo(product::class);
    }
}

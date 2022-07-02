<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class os_product extends Model
{
    use HasFactory;

    protected $fillable = [
        'os_id',
        'product_id',
    ];
}

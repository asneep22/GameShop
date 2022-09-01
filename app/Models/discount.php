<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'discount',
        'date_start',
        'date_end'
    ];

    protected $casts =[
        'date_start' => 'datetime',
        'date_end' => 'datetime',
    ];

    public function product(){
        return $this->belongsTo(product::class);
    }
}

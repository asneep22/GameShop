<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cpu extends Model
{
    use HasFactory;

    protected $fillable = [
        'pname',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}

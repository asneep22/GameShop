<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'pname',
    ];

    public function products(){
        return $this->belongsToMany(Product::class, 'genre_products');
    }
}

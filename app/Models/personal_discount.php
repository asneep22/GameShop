<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personal_discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'sum_buy',
        'disocunt_procent',
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
}

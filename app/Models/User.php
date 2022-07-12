<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'role_id',
        'personal_discount',
        'last_online_at',
        'password',
        'fio',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_online_at' => 'datetime'
    ];

    public function toSearchableArray()
    {
        return [
            'email' => $this->email,
            'last_online_at' => $this->email,
        ];
    }

    public function Role()
    {
        return $this->belongsTo(Role::class);
    }

    public function Discount()
    {
        return $this->belongsTo(personal_discount::class, 'id');
    }
    

}

<?php

namespace App\Models;

use App\Mail\LoginLink;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;


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
        'fio',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
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

    public function loginTokens()
    {
        return $this->hasMany(LoginToken::class);
    }

    public function SendLoginLink()
    {
        $plaintext = Str::random(32);
        $token = $this->loginTokens()->create([
            'token' => hash('sha256', $plaintext),
            'expires_at' => now()->addMinutes(15),
        ]);
        Mail::to($this->email)->queue(new LoginLink($plaintext, $token->expires_at));
    }
}

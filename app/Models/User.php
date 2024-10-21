<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }



    function phones()
    {
        return $this->hasMany(Phone::class, "user_id", "id");
    }

    function role()
    {
        return $this->hasOne(UserRole::class, "id", "role_id");
    }

    function phone()
    {
        $phones = Phone::where("user_id", $this->attributes["id"])->get();
        if (!is_null($phones)) {
            return $phones->pluck("item")->implode(",");
        } else {
            return "";
        }
    }

}

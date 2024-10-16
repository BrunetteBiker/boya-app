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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    function pid()
    {
        return "USR-" . Str::of($this->attributes["id"])->padLeft(6, 0);
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

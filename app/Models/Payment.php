<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Payment extends Model
{
    use HasFactory;

    function pid()
    {
        return "ÖDN" . Carbon::make($this->attributes["created_at"])->format("dmY") . Str::of($this->attributes["id"])->padLeft(6, 0);
    }

    function executor()
    {
        return $this->hasOne(User::class, "id", "executor_id");
    }

    function type()
    {
        return $this->hasOne(PaymentType::class, "id", "type_id");
    }
}

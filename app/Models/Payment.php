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
        $createdAt = Carbon::make($this->attributes["created_at"]);

        return "ÖDN" . $createdAt->format("dmY") . Str::of($this->attributes["id"])->padLeft(6, 0);
    }

    function executor()
    {
        return $this->hasOne(User::class,'id',"executor_id");
    }

}

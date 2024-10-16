<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    function pid()
    {
        $createdAt = Carbon::make($this->attributes["created_at"]);

        return "SFR" . $createdAt->format("dmY") . Str::of($this->attributes["id"])->padLeft(6, 0);
    }

    function customer()
    {
        return $this->hasOne(User::class, "id", "customer_id");
    }

    function status()
    {
        return $this->hasOne(OrderStatus::class, "id", "status_id");
    }

    function executor()
    {
        return $this->hasOne(User::class, "id", "executor_id");
    }

    function items()
    {
        return $this->hasMany(OrderItem::class, "id", "order_id");
    }

    function updateLogs()
    {
        return $this->hasMany(UpdateLog::class, "id", "order_id");
    }

}

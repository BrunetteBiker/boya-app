<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;


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
        return $this->hasMany(OrderItem::class);
    }

    function updateLogs()
    {
        return $this->hasMany(UpdateLog::class, "id", "order_id");
    }

    function payments()
    {
        return $this->hasMany(Payment::class);
    }

    function cancelledBy()
    {
        return $this->hasOne(User::class,"id","cancelled_by");
    }
}

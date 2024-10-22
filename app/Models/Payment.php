<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Payment extends Model
{
    use HasFactory;



    function executor()
    {
        return $this->hasOne(User::class, "id", "executor_id");
    }

    function customer()
    {
        return $this->hasOne(User::class, "id", "customer_id");
    }

    function type()
    {
        return $this->hasOne(PaymentType::class, "id", "type_id");
    }

    function action()
    {
        return $this->hasOne(Action::class, "id", "action_id");
    }
}

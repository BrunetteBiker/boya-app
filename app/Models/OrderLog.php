<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Title;

class OrderLog extends Model
{
    use HasFactory;

    const UPDATED_AT = null;


    function order()
    {
        return $this->hasOne(Order::class,"id","order_id");
    }

    function executor()
    {
        return $this->hasOne(User::class,"id","executor_id");
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModifyLog extends Model
{
    use HasFactory;


    function executor()
    {
        return $this->hasOne(User::class,'id',"executor_id");

    }

}

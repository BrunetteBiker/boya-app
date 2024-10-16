<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;
    public  const CREATED_AT = null;

    function product()
    {
        return $this->hasOne(Product::class, "id", "product_id");
    }

}

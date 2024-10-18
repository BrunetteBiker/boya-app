<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OrderItem extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;
    public const CREATED_AT = null;

    function pid()
    {
        return "PRD-" . Str::of($this->attributes["id"])->padLeft(6, 0);
    }

    function product()
    {
        return $this->hasOne(Product::class, "id", "product_id");
    }

}

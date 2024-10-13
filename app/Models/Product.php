<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    function pid()
    {
        return "PRD-" . Str::of($this->attributes["id"])->padLeft(6, 0);
    }

    function recommendedInterval()
    {
        return $this->attributes["min_price"]."-".$this->attributes["max_price"];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class color_product extends Model
{
    use HasFactory;

    public $fillable=["product_id","color_id"];
}

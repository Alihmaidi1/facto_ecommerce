<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property_product_value extends Model
{
    use HasFactory;

    public $fillable=["product_property_id","value_id"];

}

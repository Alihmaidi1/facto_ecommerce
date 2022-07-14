<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property_product extends Model
{
    use HasFactory;

    public $fillable=["name"];

    public function product_property(){


        return $this->hasMany("App\Models\product_property","property_id");
    }

}

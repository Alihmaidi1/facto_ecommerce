<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_property extends Model
{
    use HasFactory;

    public $fillable=["product_id","property_id"];


    public function property(){


        return $this->belongsTo("App\Models\property_product","property_id");
    }
}

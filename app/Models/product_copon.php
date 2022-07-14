<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_copon extends Model
{
    use HasFactory;

    public $fillable=["copon_id","product_id"];


}

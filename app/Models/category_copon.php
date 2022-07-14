<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_copon extends Model
{
    use HasFactory;

    public $fillable=["copon_id","category_id"];


}

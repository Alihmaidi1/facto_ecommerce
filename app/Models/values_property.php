<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class values_property extends Model
{
    use HasFactory;


    public $fillable=["property_id","value"];
}

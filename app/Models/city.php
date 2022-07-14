<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;

    public $fillable=["name","country_id","status","rank"];


    public function country(){


        return $this->belongsTo("App\Models\country","country_id");

    }
}

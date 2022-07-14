<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    use HasFactory;

    public $fillable=["name","description","logo"];



    public function products(){


        return $this->hasMany("App\Models\product","brand_id");

    }


    public function copons(){


        return $this->belongsToMany("App\Models\copon","App\Models\brand_copon","brand_id","copon_id");


    }






}

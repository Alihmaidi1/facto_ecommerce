<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    public $fillable=["name","parent","status","rank","logo","show_in_main","show_in_header"];

    public function categorys(){

        return $this->hasMany("App\Models\category","parent");
    }



    public function products(){


        return $this->hasMany("App\Models\product","category_id");

    }



    public function copons(){


        return $this->belongsToMany("App\Models\copon","App\Models\category_copon","category_id","copon_id");
    }

}

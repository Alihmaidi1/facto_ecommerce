<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class copon extends Model
{
    use HasFactory;
    public $fillable=["code","logo","name","type","value","date_start_at","date_end_at"];


    public function categorys(){

        return $this->belongsToMany("App\Models\category","App\Models\category_copon","copon_id","category_id");

    }


    public function products(){


        return $this->belongsToMany("App\Models\product","App\Models\product_copon","copon_id","product_id");


    }



    public function brands(){

        return $this->belongsToMany("App\Models\brands","App\Models\brand_copon","copon_id","brand_id");



    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;


    public $fillable=["name","selling_number","description","quantity","category_id","rate","brand_id","price","currency_id","tag","warning_count","thumbnail","minimum_quantity","have_vedio","meta_title","meta_description","meta_logo",'free_shipping','time_delivery','tax'];



    public function colors(){


        return $this->belongsToMany("App\Models\color","App\Models\color_product","product_id","color_id");


    }


    public function category(){

        return $this->belongsTo("App\Models\category","category_id");

    }

    public function brand(){

        return $this->belongsTo("App\Models\brands","brand_id");

    }


    public function currency(){


        return $this->belongsTo("App\Models\currency","currency_id");
    }



    public function copons(){


        return $this->belongsToMany("App\Models\copon","App\Models\product_copon","product_id","copon_id");


    }



}

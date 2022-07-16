<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class currency extends Model
{
    use HasFactory;

    public $fillable=["name","code","active","is_default","value_in_dular"];



    public function products(){

        return $this->hasMany("App\Models\product","currency_id");
    }


}

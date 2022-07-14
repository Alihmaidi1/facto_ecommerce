<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;
    public $fillable=["country","status","rank","logo"];


    public function citys(){

        return $this->hasmany("App\Models\city","country_id");
    }
}

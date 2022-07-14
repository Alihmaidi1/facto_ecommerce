<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seo extends Model
{
    use HasFactory;


    public $fillable=["url","title","description","logo","facebook","twitter_org","twitter_card"];
}

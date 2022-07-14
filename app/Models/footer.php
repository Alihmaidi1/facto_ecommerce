<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class footer extends Model
{
    use HasFactory;

    public $fillable=["address","phone","email","logo","logo_description","copy_right","social_media_status","facebook","twitter","instagram","youtube","linkedin"];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pages extends Model
{
    use HasFactory;

    public $fillable=["title","link","meta_title","meta_description","meta_keywords","meta_logo","content"];
}

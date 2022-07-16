<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class user extends Controller
{


    public function index(){


        return view("front.user.login");

    }


    public function register(){


        return view("front.user.register");

    }

}

<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\repo\interfaces\copon as coponinterface;
class flash extends Controller
{


    public $copon;
    public function __construct(coponinterface $copon)
    {

        $this->copon=$copon;
    }

    public function index(){

        $copons=$this->copon->getAllCopon();
        return view("front.flash.index",compact("copons"));
    }



    public function single($id){

        $copon=$this->copon->find($id);
        return view("front.flash.single",compact("copon"));

    }

}

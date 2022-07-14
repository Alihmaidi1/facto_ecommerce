<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\repo\interfaces\brand as brandinterface;
class brand extends Controller
{

    public $brand;
    public function __construct(brandinterface $brand)
    {

        $this->brand=$brand;

    }
    public function index(){

        $brands=$this->brand->getAllBrand();
        return view("front.brands.index",compact("brands"));

    }

}

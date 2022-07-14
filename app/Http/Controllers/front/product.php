<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\repo\interfaces\product as productinterface;
class product extends Controller
{

    public $product;
    public function __construct(productinterface $product)
    {

        $this->product=$product;

    }
    public function single($id){

        $product=$this->product->find($id);
        return view("front.product.single",compact("product"));




    }


}

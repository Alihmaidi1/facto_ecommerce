<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\repo\interfaces\category as categoryinterface;
use App\repo\interfaces\color as colorinterface;
use App\repo\interfaces\brand as brandinterface;
class category extends Controller

{

    public $category;
    public $color;
    public $brand;
    public function __construct(categoryinterface $category,colorinterface $color,brandinterface $brand)
    {

        $this->category=$category;
        $this->color=$color;
        $this->brand=$brand;
    }

    public function index(){

        $categorys=$this->category->getMaincategory();

        return view("front.category.all_category",compact("categorys"));


    }



    public function single($id){


        try{

            $category=$this->category->find($id);
            $categorys=$this->category->getAllCategory();
            $colors=$this->color->getAllcolor();
            $brands=$this->brand->getAllBrand();
            return view("front.category.single",compact("brands","category","categorys","colors"));

        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }



    }


}

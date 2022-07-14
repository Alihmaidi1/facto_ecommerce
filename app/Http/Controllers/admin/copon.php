<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\copon as ModelsCopon;
use Illuminate\Http\Request;
use App\repo\interfaces\copon as coponinterface;
use App\repo\interfaces\product as productinterface;
use App\repo\interfaces\category as categoryinterface;
use App\repo\interfaces\brand as brandinterface;
use App\Http\Requests\admin\copons\store as storerequest;
use App\Http\Requests\admin\copons\update as updaterequest;

class copon extends Controller
{


    public $copon;
    public $product;
    public $category;
    public $brand;
    public function __construct(coponinterface $copon,productinterface $product,categoryinterface $category,brandinterface $brand)
    {

        $this->copon=$copon;
        $this->category=$category;
        $this->product=$product;
        $this->brand=$brand;

    }

    public function index(){


        $copons=$this->copon->paginate(5);
        $products=$this->product->getAllProduct();
        return view("admin.copon.index",compact("copons","products"));


    }



    public function create(){


        $products=$this->product->getAllProduct();
        $categorys=$this->category->getAllCategory();
        $brands=$this->brand->getAllBrand();
        return view("admin.copon.create",compact("products","categorys","brands"));


    }



    public function store(storerequest $request){


        try{


            $this->copon->store($request);

            toastr()->success("The Copon Was Created Successfully");

            return redirect()->route("copon.show");

        }catch(\Exception $ex){

            return $ex->getMessage();

            toastr()->error("we Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }



    }




    public function edit($id){

        try{

            $copon=ModelsCopon::findOrFail($id);
            $products=$this->product->getAllProduct();
            $categorys=$this->category->getAllCategory();
            $brands=$this->brand->getAllBrand();
            return view("admin.copon.edit",compact("copon","products","categorys","brands"));



        }catch(\Exception $ex){


            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);


        }


    }



    public function update(updaterequest $request){

        try{

            $this->copon->update($request);
            toastr()->info("The Copon Was Updated Successfully");
            return redirect()->route("copon.show");



        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);
        }


    }



    public function delete($id){


        try{


            $this->copon->delete($id);
            toastr()->error("The copon Was Deleted Successfully");
            return redirect()->back();



        }catch(\Exception $ex){


            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }


    }
}

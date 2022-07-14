<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\repo\interfaces\brand as brandinterface;
use App\http\Requests\admin\brand\store as storerequest;
use App\http\Requests\admin\brand\update as updaterequest;

use App\Models\brands;
use Redirect;

class brand extends Controller
{

    public $brand;
    public function __construct(brandinterface $brand)
    {
        $this->brand=$brand;
    }

    public function index(){

        $brands=$this->brand->paginate(5);
        return view("admin.brand.index",compact("brands"));
    }


    public function store(storerequest $request){
        try{

            $this->brand->store($request);
            toastr()->success("The brands Was Add SuccessFully");
            return redirect()->back();


        }catch(\Exception $ex){

            toastr()->error("we Has Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);


        }




    }



    public function edit($id){


        try{

            $brand=brands::findOrFail($id);
            return view("admin.brand.edit",compact("brand"));

        }catch(\Exception $ex){

            toastr()->error("we Has Error");

            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);
        }


    }


    public function update(updaterequest $request){

        try{

            $this->brand->update($request);
            toastr()->info("The Brands Was Updated Successfully");
            return redirect()->route("show_brand");

        }catch(\Exception $ex){
            toastr()->error("we Has Error");

            return Redirect()->back()->withErrors(['message'=>$ex->getMessage()]);
        }


    }


    public function delete($id){

        try{

            $this->brand->delete($id);
            toastr()->error("The Brand Was Deleted Successfully ");

            return redirect()->back();


        }catch(\Exception $ex){


            toastr()->error("we Has Error");

            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }


    }
}

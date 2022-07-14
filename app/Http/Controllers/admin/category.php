<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\repo\interfaces\category as categoryinterface;
use App\Http\Requests\admin\category\update as updaterequest;
use App\Http\Requests\admin\category\store as storerequest;

use App\Models\category as ModelsCategory;

class category extends Controller
{


    public $category;

    public function __construct(categoryinterface $category)
    {

        $this->category=$category;
    }
    public function index(){


        $categories=$this->category->paginate(1);
        return view("admin.category.index",compact("categories"));
    }


    public function create(){

        $categories=$this->category->getAllCategory();
        return view("admin.category.create",compact("categories"));
    }


    public function store(storerequest $request){

        try{

            $this->category->store($request);
            toastr()->success("the Category Was Created Successfully");
            return redirect()->route("show_category");



        }catch(\Exception $ex){

            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(["message"=>"We Have Error"]);

        }
    }


    public function delete($id){

        try{

            $this->category->delete($id);
            toastr()->error("The Category Was Deleted Successfully");

            return redirect()->back();


        }catch(\Exception $ex){

            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }


    }


    public function edit($id){

        try{

        $categories=$this->category->getAllCategory();
            $category=ModelsCategory::findOrFail($id);
            return view("admin.category.edit",compact("category","categories"));

        }catch(\Exception $ex){

            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);
        }


    }

    public function update(updaterequest $request){

        try{

            $this->category->update($request);
            toastr()->info("The Category Was Updated Successfully");

            return redirect()->route("show_category");

        }catch(\Exception $ex){

            return $ex->getMessage();
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);
        }


    }


}

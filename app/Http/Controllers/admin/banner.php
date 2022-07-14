<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\banner\store as storerequest;
use App\Http\Requests\admin\banner\update as updaterequest;
use App\repo\interfaces\banner as bannerinterface;
class banner extends Controller
{
    //


    public $banner;
    public function __construct(bannerinterface $banner)
    {

        $this->banner=$banner;

    }



    public function index(){

        $banners=$this->banner->paginate(5);
        return view("admin.banner.index",compact("banners"));
    }


    public function create(){


        return view("admin.banner.create");


    }




    public function store(storerequest $request){



        try{


            $this->banner->store($request);

            toastr()->success("The Banner Was Created Successfully");
            return redirect()->route("banner.show");


        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);


        }






    }


    public function edit($id){


        try{

            $banner=$this->banner->find($id);

            return view("admin.banner.edit",compact("banner"));

        }catch(\Exception $ex){

            toastr()->error("We Have Error");


            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);


        }



    }



    public function update(updaterequest $request){

        try{

            $this->banner->update($request);

            toastr()->info("The Banner Was Updated Successfully");
            return redirect()->route("banner.show");

        }catch(\Exception $ex){

            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }




    }



    public function delete($id){


        try{


            $this->banner->delete($id);

            toastr()->error("the Banner Was Deleted Successfully");
            return redirect()->back();

        }catch(\Exception $ex){


            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);


        }



    }

}

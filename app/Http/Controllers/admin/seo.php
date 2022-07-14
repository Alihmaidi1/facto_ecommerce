<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\repo\interfaces\seo as seointerface;
use App\Http\Requests\admin\seo\store as storerequest;
use App\Http\Requests\admin\seo\update as updaterequest;

class seo extends Controller
{


    public $seo;
    public function __construct(seointerface $seo)
    {

        $this->seo=$seo;

    }

    public function index(){

        $seos=$this->seo->paginate(5);
        return view("admin.seo.index",compact("seos"));
    }


    public function create(){


        return view("admin.seo.create");
    }



    public function store(storerequest $request){

        try{


            $this->seo->store($request);

            toastr()->success("The Seo Setting Was Created Successfully");
            return redirect()->route("seo.show");

        }catch(\Exception $ex ){


            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }


    }




    public function edit($id){



        try{


            $seo=$this->seo->find($id);

            return view("admin.seo.edit",compact("seo"));



        }catch(\Exception $ex ){


            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);


        }


    }



    public function update(updaterequest $request){


        try{


            $this->seo->update($request);

            toastr()->info("The Seo Setting Was Updated Successfully");
            return redirect()->route("seo.show");

        }catch(\Exception $ex){


            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);
        }


    }



    public function delete($id){

        try{

            $this->seo->delete($id);

            toastr()->error("The Seo Setting Was Deleted Successfully");

            return redirect()->back();


        }catch(\Exception $ex){


            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);


        }


    }



}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\repo\interfaces\news as newsinterface;
use App\Http\Requests\admin\news\update as updaterequest;
use App\Http\Requests\admin\news\store as storerequest;
class news extends Controller
{


    public $news;
    public function __construct(newsinterface $news)
    {

        $this->news=$news;

    }

    public function index(){

        $news=$this->news->paginate(5);
        return view("admin.news.index",compact("news"));
    }


    public function create(){

        return view("admin.news.create");
    }




    public function store(storerequest $request){

        try{

            $this->news->store($request);

            toastr()->success("The new Was Created Successfully");
            return redirect()->route("news.show");

        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }

    }



    public function edit($id){


        try{


            $new=$this->news->find($id);
            return view("admin.news.edit",compact("new"));


        }catch(\Exception $ex){


            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }


    }



    public function update(updaterequest $request){


        try{

            $this->news->update($request);

            toastr()->info("The News was Updated Successfully");
            return redirect()->route("news.show");

        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }



    }



    public function delete($id){

        try{


            $this->news->delete($id);
            toastr()->error("The New Was Deleted Successfully");
            return redirect()->back();



        }catch(\Exception $ex){

            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }



    }



}

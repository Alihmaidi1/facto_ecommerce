<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\pages;
use Illuminate\Http\Request;
use App\repo\interfaces\pages as pageinterface;
use App\Http\Requests\admin\pages\store as storerequest;
use App\Http\Requests\admin\pages\update as updaterequest;

class page extends Controller
{



    public $page;
    public function __construct(pageinterface $page)
    {

        $this->page=$page;

    }



    public function index(){


        $pages=$this->page->paginate(5);

        return view("admin.page.index",compact("pages"));


    }




    public function create(){


        return view("admin.page.create");


    }



    public function store(storerequest $request){


        try{

            $this->page->store($request);
            toastr()->success("The Page Was created Successfully");
            return redirect()->route("show.pages");

        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);
        }




    }



    public function edit($id){


        try{

            $page=pages::findOrFail($id);

            return view("admin.page.edit",compact("page"));

        }catch(\Exception $ex){


            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }


    }



    public function update(updaterequest $request){


        try{


            $this->page->update($request);

            toastr()->success("The Page Was Updated SuccessFully");
            return redirect()->route("show.pages");

        }catch(\Exception $ex){

            toastr()->error("we Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);


        }



    }



    public function delete($id){


        try{

            $this->page->delete($id);
            toastr()->error("The Page Was Deleted Successfully");
            return redirect()->back();

        }catch(\Exception $ex){


            toastr()->error("we Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }


    }



}

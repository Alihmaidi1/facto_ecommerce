<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\header as ModelsHeader;
use App\Models\nav;
use Illuminate\Http\Request;
use App\repo\interfaces\header as headerInterface;
class header extends Controller
{

    public $header;

    public function __construct(headerInterface $header)
    {

        $this->header=$header;
    }

    public function index(){

        try{

            $header=ModelsHeader::findOrFail(1);
            $navs=nav::all();
        return view("admin.header.index",compact("header","navs"));

        }catch(\Exception $ex){


            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);
        }
    }


    public function store(Request $request){

        try{

            $this->header->store($request);

            toastr()->success("The Header For Website Was Updated Successfully");
            return redirect()->back();

        }catch(\Exception $ex){


            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }




    }
}

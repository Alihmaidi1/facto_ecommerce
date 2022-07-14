<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\color as ModelsColor;
use Illuminate\Http\Request;
use App\repo\interfaces\color as colorinterface;
use App\Http\Requests\admin\colors\store as storerequest;
use App\Http\Requests\admin\colors\update as updaterequest;
class color extends Controller
{


    public $color;
    public function __construct(colorinterface $color)
    {

        $this->color=$color;

    }

    public function index(){


        $colors=$this->color->paginate(5);
        return view("admin.color.index",compact("colors"));

    }


    public function store(storerequest $request){

        try{



            $this->color->store($request);
            toastr()->success("The Color Was Add Successfully");
            return redirect()->route('color.show');

        }catch(\Exception $ex){


            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }

    }


    public function edit($id){


        try{

            $color=ModelsColor::findOrFail($id);
            return view("admin.color.edit",compact("color"));

        }catch(\Exception $ex){


            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }



    }



    public function update(updaterequest $request){


        try{

            $this->color->update($request);
            toastr()->info("The Color Data Was UPdated Successfully");
            return redirect()->route("color.show");

        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }




    }




}

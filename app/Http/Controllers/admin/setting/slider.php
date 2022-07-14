<?php

namespace App\Http\Controllers\admin\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\repo\interfaces\slider as sliderinterface;
use App\http\requests\admin\settings\slider\store as storerequest;
use App\http\requests\admin\settings\slider\update as updaterequest;

use App\Models\slider as ModelsSlider;

class slider extends Controller
{

    public $slider;

    public function __construct(sliderinterface $slider)
    {

        $this->slider=$slider;

    }



    public function index(){


        $sliders=$this->slider->paginte(5);
        return view("admin.setting.slider.index",compact("sliders"));
    }


    public function create(){

        return view("admin.setting.slider.create");

    }


    public function store(storerequest $request){

        try{

            $this->slider->store($request);
            toastr()->success("the Slider Was Created Successfully");
            return redirect()->route("slider.show");

        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }


    }



    public function edit($id){

        try{

            $slider=ModelsSlider::findOrFail($id);
            return view("admin.setting.slider.edit",compact("slider"));


        }catch(\Exception $ex){

            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }



    }



    public function update(updaterequest $request){


        try{

            $this->slider->update($request);
            toastr()->success("The Slider Was Updated Successfully");
            return redirect()->route("slider.show");

        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }





    }



    public function delete($id){


        try{

            $this->slider->delete($id);
            toastr()->success("The Slider Was Deleted Successfully");
            return redirect()->back();

        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);


        }


    }

}

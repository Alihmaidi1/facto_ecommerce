<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\repo\interfaces\city as cityinterface;
use App\repo\interfaces\country as countryinterface;
use App\Http\Requests\admin\city\store as storerequest;
use App\Http\Requests\admin\city\update as updaterequest;
use App\Models\city as ModelsCity;

class city extends Controller
{

    public $city;
    public $country;
    public function __construct(cityinterface $city,countryinterface $country)
    {
        $this->city=$city;
        $this->country=$country;
    }



    public function index(){

        $citys=$this->city->paginate(5);
        return view("admin.city.index",compact("citys"));
    }


    public function create(){

        $countrys=$this->country->getallCountry();
        return view("admin.city.create",compact("countrys"));
    }



    public function store(storerequest $reuqest){

        try{

            $this->city->store($reuqest);
            toastr()->success("The City Was Created Successfully");
            return redirect()->route("city.show");


        }catch(\Exception $ex ){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }


    }


    public function edit($id){

        try{

            $city=ModelsCity::findOrFail($id);
            $countrys=$this->country->getallCountry();
            return view("admin.city.edit",compact("city","countrys"));



        }catch(\Exception $ex){


            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }


    }



    public function update(updaterequest $request){

        try{


            $this->city->update($request);

            toastr()->info("The City Was Updated Successfully");
            return redirect()->route("city.show");

        }catch(\Exception $ex){

            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }



    }



    public function delete($id){


        try{

            $this->city->delete($id);
            toastr()->error("The City Was Deleted Successfully");
            return redirect()->back();


        }catch(\Exception $ex){

            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }





    }
}

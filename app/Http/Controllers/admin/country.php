<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\http\Requests\admin\country\store as storerequest;
use App\http\Requests\admin\country\update as updaterequest;

use App\Models\country as ModelsCountry;
use App\repo\interfaces\country as countryinterface;
class country extends Controller
{


    public $country;
    public function __construct(countryinterface $country)
    {

        $this->country=$country;


    }
    public function index(){

        $countrys=$this->country->paginate(5);
        return view("admin.country.index",compact("countrys"));
    }


    public function create(){

        return view("admin.country.create");
    }


    public function store(storerequest $request){


        try{

            $this->country->store($request);
            toastr()->success("The Country Was Add Successfully");
            return redirect()->route("country.show");

        }catch(\Exception $ex){
            return $ex->getMessage();
            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }


    }



    public function edit($id){

        try{

            $country=ModelsCountry::findOrFail($id);

            return view("admin.country.edit",compact("country"));

        }catch(\Exception $ex){

            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }


    }


    public function update(updaterequest $request){

        try{

            $this->country->update($request);
            toastr()->info("The Country Data Was Updated Successfully");
            return redirect()->route("country.show");


        }catch(\Exception $ex){

            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }



    }



    public function delete($id){

        try{


            $this->country->delete($id);
            toastr()->error("The Country Was Deleted Successfully");
            return redirect()->back();

        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }






    }


}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\property_product;
use App\Models\values_property;
use Illuminate\Http\Request;
use App\repo\interfaces\property as propertyinterface;
use App\Http\Requests\admin\property\store as storerequest;
use App\Http\Requests\admin\property\update as updaterequest;
use App\Http\Requests\admin\values\store as storevaluerequest;
use App\Http\Requests\admin\values\update as updatevaluerequest;

class property extends Controller
{



    public $property;
    public function __construct(propertyinterface $property)
    {

        $this->property=$property;

    }

    public function index(){

        $propertys=$this->property->paginate(5);
        return view("admin.property.index",compact("propertys"));
    }


    public function store(storerequest $request){


        try{


            $this->property->store($request);

            toastr()->success("The Property was Add Successfully To Your Shop");

            return redirect()->back();

        }catch(\Exception $ex){


            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>"We Have Error"]);

        }


    }



    public function edit($id){

        try{

            $attribute=property_product::findOrFail($id);

            return view("admin.property.edit",compact("attribute"));


        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }


    }




    public function update(updaterequest $request){


        try{


            $this->property->update($request);
            toastr()->info("The Property Was Updated Successfully");
            return redirect()->route("property.show");

        }catch(\Exception $ex){


            toastr()->error("We Have Error");
            return redirect()->back(['message'=>$ex->getMessage()]);


        }

    }


    public function delete($id){



        try{

            $this->property->delete($id);

            toastr()->error("The Property Was Deleted SuccessFully");

            return redirect()->back();

        }catch(\Exception $ex){


            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }



    }


    public function show_value($id){

        try{

            $values=values_property::where("property_id",$id)->paginate(5);
            $property=property_product::findOrFail($id);
            return view("admin.property.values.index",compact("values","property"));

        }catch(\Exception $ex){


            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }


    }



    public function value_store(storevaluerequest $request){

        try{


            $this->property->value_store($request);

            toastr()->success("The ProPerty Was Add Successfully");
            return redirect()->back();

        }catch(\Exception $ex){


            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }


    }



    public function value_edit($id){

        try{

            $value=values_property::findOrFail($id);
            return view("admin.property.values.edit",compact("value"));

        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }




    }




    public function value_update(updatevaluerequest $request){

        try{



            $value=$this->property->update_value($request);

            toastr()->info("The Value Was Updated Successfully");
            return redirect()->route("property.value",$value->property_id);


        }catch(\Exception $ex){

            return $ex->getMessage();
            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }

    }



    public function value_delete($id){


        try{


            $this->property->delete_value($id);
            toastr()->error("The value Was Deleted Successfully");
            return redirect()->back();

        }catch(\Exception $ex){


            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }




    }


}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\repo\interfaces\currency as currencyinterface;
use App\http\Requests\admin\currency\store as storerequest;
use App\http\Requests\admin\currency\update as updaterequest;
use App\Models\currency as ModelsCurrency;
use Session;

class currency extends Controller
{
    public $currency;
    public function __construct(currencyinterface $currency)
    {

        $this->currency=$currency;
    }

    public function index(){

        $currencys=$this->currency->paginate(5);
        return view("admin.currency.index",compact("currencys"));
    }



    public function create(){

        return view("admin.currency.create");

    }


    public function store(storerequest $request){

        try{

            $this->currency->store($request);

            toastr()->success("The Currency Was Created Successfully");

            return redirect()->route("show_currency");


        }catch(\Exception $ex){

            toastr()->error("we Have Error");
            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }


    }


    public function default(Request $request){

        try{

            $this->currency->change_default($request);
            toastr()->success("The Currency Was Make Default Successfully");

            return redirect()->back();

        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);


        }


    }



    public function edit($id){

        try{

            $currency=ModelsCurrency::findOrFail($id);
            return view("admin.currency.edit",compact("currency"));

        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);
        }


    }


    public function update(updaterequest $request){

        try{

            $this->currency->update($request);
            toastr()->info("The Currency Was Updated Successfully");
            return redirect()->route('show_currency');

        }catch(\Exception $ex){
            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);
        }


    }


    public function delete($id){


        try{

            $this->currency->delete($id);
            toastr()->error("The Currency Was Deleted Successfully");

            return redirect()->back();

        }catch(\Exception $ex){

            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);
        }


    }


    public function change_in_user(Request $request){

        $currency=ModelsCurrency::where("code",$request->code)->first();
        Session::put("currency_code",$currency->code);
        Session::put("currency_name",$currency->name);
        Session::put("currency_value_in_dular",$currency->code);

    }


}

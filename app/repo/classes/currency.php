<?php

namespace App\repo\classes;

use App\Models\currency as ModelsCurrency;
use App\repo\interfaces\currency as currencyinterface;
class currency implements currencyinterface{

    public function getactivecurrency(){

        return ModelsCurrency::where("active",1)->get();
    }


    public function paginate($number)
    {

        return ModelsCurrency::paginate($number);

    }

    public function getAllCurrency(){


            return ModelsCurrency::all();
    }


    public function store($request){

        $currency=ModelsCurrency::create([

            "name"=>$request->name,
            "code"=>$request->code,
            "active"=>$request->active,
            "value_in_dular"=>$request->value_in_dular
        ]);

        return $currency;

    }

    public function change_default($request){

        $currency=ModelsCurrency::where("is_default",1)->first();
        $currency->is_default=0;
        $currency->save();
        $currency=ModelsCurrency::findOrFail($request->currency);
        $currency->is_default=1;
        $currency->save();

    }


    public function update($request){


        $currency=ModelsCurrency::findOrFail($request->id);
        $currency->name=$request->name;
        $currency->code=$request->code;
        $currency->value_in_dular=$request->value_in_dular;
        $currency->active=$request->active;
        $currency->save();

        return $currency;
    }


    public function delete($id){

        $currency=ModelsCurrency::findOrFail($id);
        $temp=$currency;
        $currency->delete();
        return $temp;
    }

}

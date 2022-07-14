<?php


namespace App\repo\classes;

use App\Models\color as ModelsColor;
use App\repo\interfaces\color as colorinterface;
class color implements colorinterface{


    public function getAllcolor(){

        return ModelsColor::all();
    }


    public function store($request){


        $color=ModelsColor::create([

            "name"=>$request->name,
            "code"=>$request->code
        ]);
        return $color;

    }


    public function paginate($number){


        return ModelsColor::paginate($number);
    }


    public function update($request){

        $color=ModelsColor::findOrFail($request->id);
        $color->name=$request->name;
        $color->code=$request->code;
        $color->save();

        return $color;
    }



}

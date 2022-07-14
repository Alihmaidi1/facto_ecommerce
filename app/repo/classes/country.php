<?php

namespace App\repo\classes;

use App\Models\country as ModelsCountry;
use App\repo\interfaces\country as countryinterface;
use Storage;

class country implements countryinterface{

    public function store($request)
    {

        $file=$request->file("logo");
        $name=time().".".$file->extension();
        Storage::disk("admin")->putFileAs("country",$file,$name);
        $country=ModelsCountry::create([

            "country"=>$request->country,
            "status"=>$request->status,
            "rank"=>$request->rank,
            "logo"=>$name

        ]);


        return $country;


    }


    public function paginate($number){

        return ModelsCountry::paginate($number);
    }


    public function update($reuqest)
    {

        $country=ModelsCountry::findOrFail($reuqest->id);
        if($reuqest->hasFile("logo")){

            unlink(public_path("uploads/country/".$country->logo));
            $file=$reuqest->file("logo");
            $name=time().".".$file->extension();
            Storage::disk("admin")->putFileAs("country",$file,$name);
        }else{

            $name=$country->logo;
        }

        $country->update([

            "country"=>$reuqest->country,
            "rank"=>$reuqest->rank,
            "logo"=>$name,
            "status"=>$reuqest->status
        ]);

    return $country;

    }


    public function delete($id){

        $country=ModelsCountry::findOrFail($id);
        $temp=$country;
        unlink(public_path("uploads/country/".$country->logo));
        $country->delete();

        return $temp;

    }


    public function getallCountry(){

        return ModelsCountry::all();
    }
}

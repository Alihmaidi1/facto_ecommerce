<?php

namespace App\repo\classes;

use App\Models\city as ModelsCity;
use App\repo\interfaces\city as cityinterface;
class city implements cityinterface{


    public function paginate($number){

        return ModelsCity::paginate($number);

    }


    public function store($request)
    {

        $city=ModelsCity::create([

            "name"=>$request->name,
            "country_id"=>$request->country_id,
            "status"=>$request->status,
            "rank"=>$request->rank


        ]);

        return $city;
    }



    public function update($request)
    {


        $city=ModelsCity::findOrFail($request->id);
        $city->update([

            "name"=>$request->name,
            "rank"=>$request->rank,
            "status"=>$request->status,
            "country_id"=>$request->country_id

        ]);

        return $city;
    }



    public function delete($id)
    {

        $city=ModelsCity::findOrFail($id);
        $temp=$city;
        $city->delete();
        return $temp;

    }
}

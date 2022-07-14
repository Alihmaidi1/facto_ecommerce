<?php

namespace App\repo\classes;
use App\Models\property_product;
use App\Models\values_property;
use App\repo\interfaces\property as propertyinterface;
class property implements propertyinterface{


    public function store($request){


        $property=property_product::create([

            "name"=>$request->name


        ]);

        return $property;
    }

    public function paginate($number){

        return property_product::paginate($number);
    }


    public function update($request)
    {

        $property=property_product::findOrFail($request->id);
        $property->name=$request->name;
        $property->save();
        return $property;

    }



    public function delete($id){

        $property=property_product::findOrFail($id);
        $temp=$property;
        $property->delete();
        return $temp;

    }


    public function value_store($request){

        $value=values_property::create([

            "property_id"=>$request->attribute_id,
            "value"=>$request->value
        ]);

        return $value;


    }


    public function update_value($request){


        $value=values_property::findOrFail($request->id);

        $value=$value->update([

            "value"=>$request->value

        ]);
        $value=values_property::findOrFail($request->id);

        return $value;

    }

    public function delete_value($id){

        $value=values_property::findOrFail($id);
        $temp=$value;
        $value->delete();
        return $temp;

    }

    public function getAllproperty(){

        return property_product::all();
    }


}

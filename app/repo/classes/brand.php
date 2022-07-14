<?php

namespace App\repo\classes;

use App\Models\brands;
use App\repo\interfaces\brand as brandinterface;
use Storage;

class brand implements brandinterface{



    public function getAllBrand(){

        return brands::all();
    }


    public function paginate($number){


        return  brands::paginate($number);

    }


    public function store($request)
    {
        $file=$request->file("logo");
        $name=time().".".$file->extension();
        Storage::disk("admin")->putFileAs("brands",$file,$name);

        $brand=brands::create([
            "name"=>$request->name,
            "description"=>$request->description,
            "logo"=>$name
        ]);


        return $brand;
    }



    public function update($request)
    {
        $brand=brands::findOrFail($request->id);
        if($request->hasFile("logo")){

                unlink(public_path("uploads/brands/".$brand->logo));
                $file=$request->file("logo");
                $name=time().".".$file->extension();
                Storage::disk("admin")->putFileAs("brands",$file,$name);


                $brand=$brand->update([
                    "name"=>$request->name,
                    "description"=>$request->description,
                    "logo"=>$name
                ]);
        }else{

            $brand=$brand->update([
                "name"=>$request->name,
                "description"=>$request->description,
            ]);

        }


        return $brand;


    }



    public function delete($id)
    {

        $brand=brands::findOrFail($id);
        unlink(public_path("uploads/brands/".$brand->logo));
        $brand->delete();




    }
}

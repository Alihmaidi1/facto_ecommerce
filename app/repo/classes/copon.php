<?php
namespace App\repo\classes;

use App\Models\brand_copon;
use App\Models\category_copon;
use App\Models\copon as ModelsCopon;
use App\Models\product_copon;
use App\repo\interfaces\copon as coponinterface;
use Storage;

class copon  implements coponinterface{

    public function find($id){

        return ModelsCopon::findOrFail($id);


    }


    public function getAllCopon(){

        return ModelsCopon::all();
    }


    public function paginate($number){

        return ModelsCopon::paginate($number);
    }


    public function store($request){

        $file=$request->file("logo");
        $name=time().".".$file->extension();
        Storage::disk("admin")->putFileAs("copons",$file,$name);

        $copon= ModelsCopon::create([
            "code"=>$request->code,
            "type"=>$request->type,
            "value"=>$request->value,
            "name"=>$request->name,
            "date_start_at"=>$request->date_start_at,
            "date_end_at"=>$request->date_end_at,
            "logo"=>$name
        ]);

        if(isset($request->products)){

            foreach($request->products as $product){
            product_copon::create([

                "product_id"=>$product,
                "copon_id"=>$copon->id
            ]);

            }

        }



        if(isset($request->brands)){

            foreach($request->brands as $brand){
            brand_copon::create([

                "brand_id"=>$brand,
                "copon_id"=>$copon->id
            ]);

            }

        }



        if(isset($request->categorys)){

            foreach($request->categorys as $category){
            category_copon::create([

                "category_id"=>$category,
                "copon_id"=>$copon->id
            ]);

            }

        }











    }



    public function update($request){

        $copon=ModelsCopon::findOrFail($request->id);

        if($request->hasFile("logo")){

            unlink(public_path('uploads/copons/'.$copon->logo));
            $file=$request->file("logo");
            $name=time().".".$file->extension();
            Storage::disk("admin")->putFileAs("copons",$file,$name);


        }else{

            $name=$copon->logo;

        }
        product_copon::where("copon_id",$copon->id)->delete();
        category_copon::where("copon_id",$copon->id)->delete();
        brand_copon::where("copon_id",$copon->id)->delete();
         $copon->update([
            "code"=>$request->code,
            "type"=>$request->type,
            "value"=>$request->value,
            "name"=>$request->name,
            "logo"=>$name,
            "date_start_at"=>$request->date_start_at,
            "date_end_at"=>$request->date_end_at
        ]);


        if(isset($request->products)){

            foreach($request->products as $product){
            product_copon::create([

                "product_id"=>$product,
                "copon_id"=>$copon->id
            ]);

            }

        }



        if(isset($request->brands)){

            foreach($request->brands as $brand){
            brand_copon::create([

                "brand_id"=>$brand,
                "copon_id"=>$copon->id
            ]);

            }

        }



        if(isset($request->categorys)){

            foreach($request->categorys as $category){
            category_copon::create([

                "category_id"=>$category,
                "copon_id"=>$copon->id
            ]);

            }

        }




    }


    public function delete($id){

        product_copon::where("copon_id",$id)->delete();
        category_copon::where("copon_id",$id)->delete();
        brand_copon::where("copon_id",$id)->delete();
        ModelsCopon::findOrFail($id)->delete();


    }

}

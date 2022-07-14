<?php

namespace App\repo\classes;

use App\Models\category as ModelsCategory;
use App\repo\interfaces\category as categoryinterface;
use Illuminate\Support\Facades\Storage;

class category implements categoryinterface{




    public function find($id){


        return ModelsCategory::findOrFail($id);
    }

    public function getMaincategory(){


        return ModelsCategory::where("status",1)->where("parent",null)->get();

    }

    public function getOrderAll($type){

        return ModelsCategory::orderBy("rank",$type)->get();

    }


    public function show_in_header(){

        return ModelsCategory::where("show_in_header",1)->orderBy("rank","DESC")->get();


    }


    public function paginate($number)
    {

        return ModelsCategory::paginate($number);
    }


    public function getAllCategory()
    {
        return ModelsCategory::all();
    }

    public function store($request)
    {

        if($request->parent==0){

            $parent=null;
        }else{

            $parent=$request->parent;
        }
        if($request->hasFile("logo")){

            $file=$request->file("logo");
            $name=time().".".$file->extension();
            Storage::disk("admin")->putFileAs("category",$file,$name);
            $category=ModelsCategory::create([
                "name"=>$request->name,
                "parent"=>$parent,
                "status"=>$request->status,
                "rank"=>$request->rank,
                "show_in_main"=>$request->show_in_main,
                "show_in_header"=>$request->show_in_header,
                "logo"=>$name
            ]);



        }else{

            $category=ModelsCategory::create([
                "name"=>$request->name,
                "parent"=>$parent,
                "status"=>$request->status,
                "rank"=>$request->rank,
                "show_in_main"=>$request->show_in_main,
                "show_in_header"=>$request->show_in_header
            ]);


        }

        return $category;
    }


    public function delete($id)
    {

        $category=ModelsCategory::findOrFail($id);
        unlink(public_path("uploads/category/".$category->logo));
        $category->delete();

    }

    public function update($request)
    {

        if($request->parent==0){

            $parent=null;
        }else{

            $parent=$request->parent;
        }
        $category=ModelsCategory::findOrFail($request->id);
        if($request->hasFile("logo")){
            unlink(public_path("uploads/category/".$category->logo));
            $file=$request->file("logo");
            $name=time().".".$file->extension();
            Storage::disk("admin")->putFileAs("category",$file,$name);
            $category=$category->update([
                "name"=>$request->name,
                "parent"=>$parent,
                "status"=>$request->status,
                "rank"=>$request->rank,
                "show_in_main"=>$request->show_in_main,
                "show_in_header"=>$request->show_in_header,
                "logo"=>$name
            ]);
        }else{

            $category=$category->update([
                "name"=>$request->name,
                "parent"=>$parent,
                "status"=>$request->status,
                "rank"=>$request->rank,
                "show_in_main"=>$request->show_in_main,
                "show_in_header"=>$request->show_in_header,
                "logo"=>$category->logo
            ]);

        }




        return $category;




    }

}

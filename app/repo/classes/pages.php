<?php

namespace App\repo\classes;
use App\Models\pages as pageModel;
use App\repo\interfaces\pages as pageinterface;
use Storage;

class pages implements pageinterface{


    public function store($request){


        $file=$request->file("logo");
        $name=time().".".$file->extension();
        Storage::disk("admin")->putFileAs("page",$file,$name);
        $page=pageModel::create([

            "title"=>$request->title,
            "link"=>$request->url,
            "meta_title"=>$request->title,
            "meta_description"=>$request->meta_description,
            "meta_keywords"=>$request->meta_keywords,
            "content"=>$request->content,
            "meta_logo"=>$name
        ]);

        return $page;

    }


    public function paginate($number){


        return pageModel::paginate($number);



    }

    public function update($request){

        $page=pageModel::findOrFail($request->id);
        if($request->hasFile("logo")){

            unlink(public_path("uploads/page/".$page->meta_logo));
            $file=$request->file("logo");
            $name=time().".".$file->extension();
            Storage::disk("admin")->putFileAs("page",$file,$name);
        }else{

            $name=$page->meta_logo;
        }

        $page=$page->update([

            "title"=>$request->title,
            "link"=>$request->url,
            "meta_title"=>$request->title,
            "meta_description"=>$request->meta_description,
            "meta_keywords"=>$request->meta_keywords,
            "content"=>$request->content,
            "meta_logo"=>$name

        ]);


        return $page;



    }



    public function delete($id){


        $page=pageModel::findOrFail($id);
        $temp=$page;
        unlink(public_path("uploads/page/".$page->meta_logo));
        $page->delete();
        return $temp;


    }

}

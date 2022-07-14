<?php

namespace App\repo\classes;
use App\repo\classes;
use App\Models\banner as bannerModels;
use App\repo\interfaces\banner as bannerinterface;
use Storage;

class banner implements bannerinterface{



    public function store($request){

        $file=$request->file("logo");
        $name=time().".".$file->extension();
        Storage::disk("admin")->putFileAs("banners",$file,$name);
        $banner=bannerModels::create([


            "title"=>$request->title,
            "url"=>$request->url,
            "type"=>$request->type,
            "status"=>$request->status,
            "error_message"=>$request->message_error,
            "rank"=>$request->rank,
            "description"=>$request->description,
            "logo"=>$name
        ]);

        return $banner;

    }


    public function paginate($number)
    {


        return bannerModels::paginate($number);
    }

    public function find($id){


        return bannerModels::findOrFail($id);


    }


    public function update($request)
    {


        $banner=$this->find($request->id);
        if($request->hasFile("logo")){

            unlink(public_path("uploads/banners/".$banner->logo));
            $file=$request->file("logo");
            $name=time().".".$file->extension();
            Storage::disk("admin")->putFileAs("banners",$file,$name);
        }else{

            $name=$banner->logo;
        }

        $banner=$banner->update([

            "title"=>$request->title,
            "url"=>$request->url,
            "type"=>$request->type,
            "status"=>$request->status,
            "error_message"=>$request->message_error,
            "rank"=>$request->rank,
            "description"=>$request->description,
            "logo"=>$name

        ]);

        return $banner;

    }


    public function delete($id){


        $banner=$this->find($id);
        unlink(public_path("uploads/banners/".$banner->logo));
        $temp=$banner;
        $banner->delete();
        return $temp;


    }
}

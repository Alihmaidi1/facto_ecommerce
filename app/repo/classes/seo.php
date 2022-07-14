<?php


namespace App\repo\classes;
use App\Models\seo as seoModels;
use App\repo\interfaces\seo as seointerface;
use Storage;

class seo implements seointerface{


    public function store($request)
    {


        $file=$request->file("logo");
        $name=time().".".$file->extension();
        Storage::disk("admin")->putFileAs("seos",$file,$name);
        $seo=seoModels::create([

            "title"=>$request->title,
            "url"=>$request->url,
            "facebook"=>$request->facebook,
            "description"=>$request->description,
            "twitter_org"=>$request->twitter_org,
            "twitter_card"=>$request->twitter_card,
            "logo"=>$name

        ]);


        return $seo;

    }


    public function paginate($number){

        return seoModels::paginate($number);



    }


    public function find($id){

        return seoModels::findOrFail($id);
    }

    public function update($request){

        $seo=$this->find($request->id);
        if($request->hasFile("logo")){

            unlink(public_path("uploads/seos/".$seo->logo));
            $file=$request->file("logo");
            $name=time().".".$file->extension();
            Storage::disk("admin")->putFileAs("seos",$file,$name);

        }else{

            $name=$seo->logo;
        }


        $seo=$seo->update([
            "title"=>$request->title,
            "url"=>$request->url,
            "facebook"=>$request->facebook,
            "description"=>$request->description,
            "twitter_org"=>$request->twitter_org,
            "twitter_card"=>$request->twitter_card,
            "logo"=>$name
        ]);


        return $seo;




    }


    public function delete($id)
    {

        $seo=$this->find($id);
        $temp=$seo;
        unlink(public_path("uploads/seos/".$seo->logo));
        $seo->delete();
        return $temp;

    }

}

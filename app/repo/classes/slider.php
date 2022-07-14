<?php

namespace App\repo\classes;

use App\Models\slider as ModelsSlider;
use App\repo\interfaces\slider as sliderinterface;
use Storage;

class slider implements sliderinterface{



    public function getAllOrder($type)
    {
        return ModelsSlider::orderBy("rank",$type)->get();
    }

    public function getAllSliders(){

        return ModelsSlider::all();
    }


    public function paginte($number)
    {

        return ModelsSlider::paginate($number);


    }


    public function store($request)
    {

        $file=$request->file('logo');
        $name=time().".".$file->extension();
        Storage::disk("admin")->putFileAs("settings/sliders/",$file,$name);
        $slider=ModelsSlider::create([

            "name"=>$request->name,
            "description"=>$request->description,
            "url"=>$request->url,
            "status"=>$request->status,
            "rank"=>$request->rank,
            "logo"=>$name


        ]);

        return $slider;
    }



    public function update($request)
    {

        $slider=ModelsSlider::findOrFail($request->id);
        if($request->hasFile("logo")){

            unlink(public_path("uploads/admin/settings/sliders/".$slider->logo));
            $file=$request->file("logo");
            $name=time().".".$file->extension();
            Storage::disk("admin")->putFileAs("/settings/sliders",$file,$name);
        }else{
            $name=$slider->logo;
        }

        $slider=$slider->update([

            "name"=>$request->name,
            "description"=>$request->description,
            "url"=>$request->url,
            "logo"=>$name,
            "status"=>$request->status,
            "rank"=>$request->rank


        ]);

        return $slider;

    }


    public function delete($id)
    {

        $slider=ModelsSlider::findOrFail($id);
        $temp=$slider;
        unlink(public_path("uploads/settings/sliders/".$slider->logo));
        $slider->delete();
        return $temp;

    }


}

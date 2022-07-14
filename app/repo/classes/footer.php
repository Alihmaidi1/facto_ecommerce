<?php

namespace App\repo\classes;

use App\Models\footer as ModelsFooter;
use App\Models\footernav;
use App\repo\interfaces\footer as footerinterface;
use Storage;

class footer implements footerinterface{


    public function updatelogo($request){

        $footer=ModelsFooter::findOrFail(1);
        if($request->hasFile("logo")){

            if($footer->logo!=null){

                unlink(public_path("uploads/footer/".$footer->logo));

            }
            $file=$request->file("logo");
            $name=time().".".$file->extension();
            Storage::disk("admin")->putFileAs("footer",$file,$name);

        }else{

            $name=$footer->logo;

        }

        $footer->logo=$name;
        $footer->logo_description=$request->logo_description;
        $footer->save();
        return $footer;

    }


    public function updatecontact($request){


        $footer=ModelsFooter::findOrFail(1);
        $footer->address=$request->address;
        $footer->phone=$request->phone;
        $footer->email=$request->email;
        $footer->save();
        return $footer;


    }


    public function updatenav($request){

        $footer=ModelsFooter::findOrFail(1);
        $footer->navtitle=$request->navtitle;
        $footer->save();
        footernav::truncate();
        if($request->widget_one_labels!=null){


            foreach($request->widget_one_labels as $key=>$label){


                footernav::create([

                    "link"=>$label,
                    "value"=>$request->widget_one_links[$key]
                ]);

            }


        }

    }


    public function updatesocial($request){

        $footer=ModelsFooter::findOrFail(1);
        $footer->copy_right=$request->copy_right;
        $footer->social_media_status=($request->social_status=="on")?1:0;
        $footer->facebook=$request->facebook;
        $footer->twitter=$request->twitter;
        $footer->instagram=$request->instagram;
        $footer->youtube=$request->youtube;
        $footer->linkedin=$request->linkedin;
        $footer->save();
        return $footer;





    }
}

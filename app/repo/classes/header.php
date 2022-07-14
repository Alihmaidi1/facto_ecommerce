<?php


namespace App\repo\classes;
use App\repo\interfaces\header as headerinterface;

use App\Models\header as headerModels;
use App\Models\nav;
use Storage;

class header implements headerinterface{


    public function store($request)
    {

        $header=headerModels::findOrFail(1);

        if($request->hasFile("logo")){

            if($header->logo!=null){

                unlink(public_path("uploads/headers/".$header->logo));

            }

            $file=$request->file("logo");
            $name=time().".".$file->extension();
            Storage::disk("admin")->putFileAs("headers",$file,$name);

        }else{

            $name=$header->logo;
        }

        if(isset($request->show_language_switcher)){

            $language=1;

        }else{


            $language=0;

        }



        if(isset($request->show_currency_switcher)){

            $currency=1;

        }else{


            $currency=0;

        }



        if(isset($request->header_stikcy)){

            $fix=1;

        }else{


            $fix=0;

        }

        $header->update([

            "language"=>$language,
            "currency"=>$currency,
            "fix"=>$fix,
            "logo"=>$name


        ]);

        if(isset($request->header_menu_labels)){

            nav::truncate();

            foreach($request->header_menu_labels as $key=>$label){

                nav::create([

                    "label"=>$label,
                    "link"=>$request->header_menu_links[$key]

                ]);

            }

        }

    }

}

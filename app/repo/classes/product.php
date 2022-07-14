<?php


namespace App\repo\classes;
use App\Models\color_product;
use App\Models\product as ModelsProduct;
use App\Models\product_image;
use App\Models\product_property;
use App\Models\property_product_value;
use App\repo\interfaces\product as productinterface;
use Storage;

class product implements productinterface{


    public function find($id){


        return ModelsProduct::findOrFail($id);


    }


    public function getAllProduct(){

        return ModelsProduct::all();
    }

    public function paginate($number){

        return ModelsProduct::paginate($number);
    }



    public function store($request){

        $tags='';

        foreach(json_decode($request->tags[0]) as $tag){


            $tags=$tags.$tag->value.",";


        }

        $main_file=$request->file("thumbnail");
        $name=time().".".$main_file->extension();
        Storage::disk("admin")->putFileAs("products/thumbnail",$main_file,$name);

        $meta_logo=$request->file("meta_logo");
        $logo=round(rand()*10000000).".".$meta_logo->extension();
        Storage::disk("admin")->putFileAs("products/logo",$main_file,$logo);


        if(isset($request->free_shipping)){

            $shipping=1;

        }else{

            $shipping=0;

        }


        $product=new ModelsProduct();
        $product->name=$request->name;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->price=$request->unit_price;
        $product->currency_id=$request->curenncy_id;
        $product->tag=$tags;
        $product->warning_count=$request->low_stock_quantity;
        $product->thumbnail=$name;
        $product->minimum_quantity=$request->minimum_quantity;
        $product->vedio_link=$request->video_link;
        $product->meta_title=$request->meta_title;
        $product->meta_description=$request->meta_description;
        $product->meta_logo=$logo;
        $product->free_shipping=$shipping;
        $product->time_delivery=$request->est_shipping_days;
        $product->tax=$request->tax;
        $product->tax_type=$request->tax_type;
        $product->save();

        if($request->hasFile("gallery")){

            foreach($request->file("gallery") as $File){


                $name=round(rand()*1000000000000000).".".$File->extension();
                Storage::disk("admin")->putFileAs("products/gallery",$File,$name);
                product_image::create([
                    "product_id"=>$product->id,
                    "url"=>$name
                ]);


            }


        }

        foreach($request->colors as $color){

            color_product::create([

                "product_id"=>$product->id,
                "color_id"=>$color
            ]);

        }


        if(isset($request->choice_no)){

            foreach($request->choice_no as $property_id){

                $product_property=product_property::create([
                    "property_id"=>$property_id,
                    "product_id"=>$product->id
                ]);

                $array=$request->input("choice_options_".$property_id);
                foreach($array as $arr){

                    property_product_value::create([

                        "product_property_id"=>$product_property->id,
                        "value_id"=>$arr

                    ]);
                }
            }


        }

        return $product;


    }




    public function update($request){

        $product=ModelsProduct::findOrFail($request->id);


        $tags='';

        foreach(json_decode($request->tags[0]) as $tag){


            $tags=$tags.$tag->value.",";


        }
        if($request->hasFile("thumbnail")){

            unlink(public_path("uploads/products/thumbnail/".$product->thumbnail));
            $main_file=$request->file("thumbnail");
            $name=time().".".$main_file->extension();
            Storage::disk("admin")->putFileAs("products/thumbnail",$main_file,$name);


        }else{


            $name=$product->thumbnail;

        }


        if($request->hasFile("meta_logo")){

            unlink(public_path("uploads/products/logo/".$product->meta_logo));
            $meta_logo=$request->file("meta_logo");
            $logo=round(rand()*10000000).".".$meta_logo->extension();
            Storage::disk("admin")->putFileAs("products/logo",$main_file,$logo);

        }else{

            $logo=$product->meta_logo;
        }

        if(isset($request->free_shipping)){

            $shipping=1;

        }else{

            $shipping=0;

        }

        $product->name=$request->name;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->price=$request->unit_price;
        $product->currency_id=$request->curenncy_id;
        $product->tag=$tags;
        $product->warning_count=$request->low_stock_quantity;
        $product->thumbnail=$name;
        $product->minimum_quantity=$request->minimum_quantity;
        $product->vedio_link=$request->video_link;
        $product->meta_title=$request->meta_title;
        $product->meta_description=$request->meta_description;
        $product->meta_logo=$logo;
        $product->free_shipping=$shipping;
        $product->time_delivery=$request->est_shipping_days;
        $product->tax=$request->tax;
        $product->tax_type=$request->tax_type;
        $product->save();

        if($request->hasFile("gallery")){

            product_image::where("product_id",$product->id)->delete();
            foreach($request->file("gallery") as $File){


                $name=round(rand()*1000000000000000).".".$File->extension();
                Storage::disk("admin")->putFileAs("products/gallery",$File,$name);
                product_image::create([
                    "product_id"=>$product->id,
                    "url"=>$name
                ]);


            }


        }


        color_product::where("product_id",$product->id)->delete();
        foreach($request->colors as $color){

            color_product::create([

                "product_id"=>$product->id,
                "color_id"=>$color
            ]);

        }


        if(isset($request->choice_no)){

            product_property::where("product_id",$product->id)->delete();
            foreach($request->choice_no as $property_id){

                $product_property=product_property::create([
                    "property_id"=>$property_id,
                    "product_id"=>$product->id
                ]);

                $array=$request->input("choice_options_".$property_id);
                foreach($array as $arr){

                    property_product_value::create([

                        "product_property_id"=>$product_property->id,
                        "value_id"=>$arr

                    ]);
                }
            }


        }


        return $product;




    }



    public function delete($id)
    {


        $product=ModelsProduct::findOrFail($id);
        color_product::where("product_id",$product->id)->delete();
        product_property::where("product_id",$product->id)->delete();
        unlink(public_path("uploads/products/logo/".$product->meta_logo));
        unlink(public_path("uploads/products/thumbnail/".$product->thumbnail));
        foreach(product_image::where("product_id",$product->id)->get() as $img){

            unlink(public_path("uploads/products/gallery/".$img->url));

        }
        product_image::where("product_id",$product->id)->delete();
        $temp=$product;
        $product->delete();
        return $temp;

    }


}

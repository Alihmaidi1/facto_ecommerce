<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\color_product;
use App\Models\product as ModelsProduct;
use App\Models\product_property;
use App\Models\property_product_value;
use App\Models\values_property;
use Illuminate\Http\Request;
use App\repo\interfaces\category as categoryinterface;
use App\repo\interfaces\brand as brandinterface;
use App\repo\interfaces\color as colorinterface;
use App\repo\interfaces\property as propertyinterface;
use App\repo\interfaces\currency as currencyinterface;
use App\repo\interfaces\product as productinterface;
use App\Http\Requests\admin\products\store as storerequest;
use App\Http\Requests\admin\products\update as updaterequest;

class product extends Controller
{


    public $category;
    public $brand;
    public $color;
    public $property;
    public $currency;
    public $product;
    public function __construct(categoryinterface $category,brandinterface $brand,colorinterface $color,propertyinterface $property,currencyinterface $currency,productinterface $product)
    {

        $this->currency=$currency;
        $this->property=$property;
        $this->category=$category;
        $this->brand=$brand;
        $this->color=$color;
        $this->product=$product;
    }


    public function index(){


        $products=$this->product->paginate(5);

        return view("admin.product.index",compact("products"));


    }



    public function create(){


        $categorys=$this->category->getAllCategory();
        $brands=$this->brand->getAllBrand();
        $colors=$this->color->getAllcolor();
        $currencys=$this->currency->getAllCurrency();
        $propertys=$this->property->getAllproperty();
        return view("admin.product.create",compact("categorys","brands","colors","propertys","currencys"));
    }



    public function get_attribute(Request $request){




        $all_attribute_values = values_property::where('property_id', $request->attribute_id)->get();

        $html = '';

        foreach ($all_attribute_values as $row) {
            $html .= '<option value="' . $row->id . '">' . $row->value . '</option>';
        }

        echo json_encode($html);



    }




    public function store(storerequest $request){

        try{

            $this->product->store($request);
            toastr()->success("The Product Was Created Successfully");
            return redirect()->route("product.show");

        }catch(\Exception $ex){

            return $ex->getMessage();
            toastr()->error("We Have Error");
            redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }







    }




    public function edit($id){

        try{

            $product=ModelsProduct::findOrFail($id);
            $categorys=$this->category->getAllCategory();
            $brands=$this->brand->getAllBrand();
            $colors=$this->color->getAllcolor();
            $currencys=$this->currency->getAllCurrency();
            $propertys=$this->property->getAllproperty();
            $selected_color=color_product::where("product_id",$id)->get();
            $selected_property=product_property::where("product_id",$id)->get();
            return view("admin.product.edit",compact("selected_property","selected_color","product","categorys","brands","colors","currencys","propertys"));


        }catch(\Exception $ex){


            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }


    }



    public function update(updaterequest $request){


        try{

            $this->product->update($request);
            toastr()->info("The Product Was Updated Successfully");
            return redirect()->route("product.show");


        }catch(\Exception $ex){

            return $ex->getMessage();
            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }






    }




    public function delete($id){


        try{

            $this->product->delete($id);
            toastr()->error("The Product Was Deleted Successfully");
            return redirect()->back();


        }catch(\Exception $ex){

            return $ex->getMessage();
            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);

        }


    }


}

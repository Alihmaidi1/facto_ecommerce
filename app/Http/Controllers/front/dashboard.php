<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Models\brands;
use App\Models\category;
use App\Models\copon;
use Illuminate\Http\Request;
use App\repo\interfaces\slider as sliderinterface;
use App\repo\interfaces\category as categoryinterface;
use App\repo\interfaces\product as productinterface;
use App\repo\interfaces\currency as currencyonterface;
use App\Models\footer as footerModels;
use App\Models\footernav;
use App\Models\nav;
use App\Models\product;
use App\Models\product_copon;

class dashboard extends Controller
{


    public $sliders;
    public $categorys;
    public $products;
    public $currency;
    public function __construct(sliderinterface $slider,categoryinterface $category,productinterface $product,currencyonterface $currency)
    {

        $this->sliders=$slider;
        $this->categorys=$category;
        $this->products=$product;
        $this->currency=$currency;
    }
    public function index(){

        try{

            $sliders=$this->sliders->getAllOrder("DESC");
            $categorys=$this->categorys->getOrderAll("DESC");
            $products=$this->products->getAllProduct();
            $footer=footerModels::findOrFail(1);
            $Category_show_in_header=$this->categorys->show_in_header();
            $category_in_main=category::where("show_in_main",1)->get();
            $navs=nav::all();
            $brands=brands::paginate(10);
            $top_category=category::orderBy("rank","DESC")->paginate(10);
            $banners=banner::where("status",1)->orderBy("rank","DESC")->get();
            $new_products=product::orderBy("id","DESC")->paginate(10);
            $nav_footer=footernav::all();
            $product_today_hot=copon::where("date_end_at",">=",date("Y-m-d"))->where("name","hot")->first()->products;
            $best_selling_products=product::orderBy("selling_number","DESC")->paginate(10);
            $flashs=copon::where("show_in_main",1)->get();
            return view("front.index",compact("flashs","best_selling_products","product_today_hot","category_in_main","nav_footer","sliders","categorys","products","footer","Category_show_in_header","navs","brands","top_category","banners","new_products"));


        }catch(\Exception $ex){

            return dd($ex->getMessage());
        }

    }


}

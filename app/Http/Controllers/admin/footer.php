<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\admin\footer\updatelogo;
use App\Http\Requests\admin\footer\updatesocialmedia;
use App\Http\Requests\admin\footer\updatecontact;
use App\Http\Requests\admin\footer\updatenav;

use App\Http\Controllers\Controller;
use App\Models\footer as ModelsFooter;
use App\repo\interfaces\footer as footerInterface;
class footer extends Controller
{



    public $footer;
    public function __construct(footerInterface $footer)
    {

        $this->footer=$footer;

    }

    public function index(){

        try{

        $footer=ModelsFooter::findOrFail(1);
        return view("admin.footer.index",compact("footer"));

        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(["message"=>$ex->getMessage()]);
        }
    }


    public function updatelogo(updatelogo $request){


        try{



            $this->footer->updatelogo($request);

            toastr()->info("The Logo For Website Was Updated Successfully");
            return redirect()->back();


        }catch(\Exception $ex){

            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }

    }



    public function updatecontact(updatecontact $request){

        try{

            $this->footer->updatecontact($request);
            toastr()->info("the Contact Info Was Updated SuccessFully");
            return redirect()->back();


        }catch(\Exception $ex){

            toastr()->error("We Have Error");

            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }


    }



    public function updatenav(updatenav $request){

        try{


            $this->footer->updatenav($request);
            toastr()->info("The Footer Nav Was Updated Successfully");

            return redirect()->back();

        }catch(\Exception $ex){

            toastr()->error("We Have Error");
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);

        }


    }




    public function updatesocial(updatesocialmedia $request){

        try{

            $this->footer->updatesocial($request);
            return redirect()->back();


        }catch(\Exception $ex){

            return $ex->getMessage();
            return redirect()->back()->withErrors(['message'=>$ex->getMessage()]);
        }


    }

}

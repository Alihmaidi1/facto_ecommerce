<?php


namespace App\repo\classes;

use App\Models\User as ModelsUser;
use App\repo\interfaces\User as userInterface;
use Illuminate\Support\Facades\Storage;

class User implements userInterface{


    public function update($request)
    {

        $user=ModelsUser::findOrFail($request->id);
        $user->name=$request->name;
        $user->email=$request->email;
        if(!empty($request->password)){

            $user->password=$request->password;

        }

        if($request->hasFile('avatar')){
            if(auth("web")->user()->avatar!=null){
                unlink(public_path("uploads/admin/".auth("web")->user()->avatar));
            }
            $file=$request->file("avatar");
            $extension=$file->extension();
            $name=time().".".$extension;
            Storage::disk("admin")->putFileAs("admin",$request->file("avatar"),$name);
            $user->avatar=$name;
        }
        $user->save();

    }


}

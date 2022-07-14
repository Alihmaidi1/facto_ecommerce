<?php

namespace App\repo\classes;
use App\Models\news as newsModels;

use App\repo\interfaces\news as newsinterface;
class news  implements newsinterface{


    public function getAllnews(){

        return newsModels::all();
    }

    public function paginate($numbeer){


        return newsModels::paginate($numbeer);


    }


    public function store($request)
    {

        $news=newsModels::create([


            "title"=>$request->title,
            "description"=>$request->description,
            "status"=>$request->status

        ]);

        return $news;

    }


    public function find($id){


        return newsModels::findOrFail($id);


    }



    public function update($request){

        $new=$this->find($request->id);
        $new->title=$request->title;
        $new->description=$request->description;
        $new->status=$request->status;
        $new->save();

        return $new;


    }



    public function delete($id){


        $new=$this->find($id);
        $temp=$new;
        $new->delete();
        return $temp;


    }

}

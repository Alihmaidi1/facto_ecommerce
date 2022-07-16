<?php

namespace Database\Seeders;

use App\Models\nav as ModelsNav;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class nav extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        ModelsNav::create([
            "label"=>"Home",
            "link"=>""
        ]);


        ModelsNav::create([
            "label"=>"All Brands",
            "link"=>"all_brands"
        ]);


        ModelsNav::create([
            "label"=>"Flash",
            "link"=>"all_flash"
        ]);



        ModelsNav::create([
            "label"=>"All Categorys",
            "link"=>"categorys"
        ]);

    }

}

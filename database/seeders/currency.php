<?php

namespace Database\Seeders;

use App\Models\currency as ModelsCurrency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class currency extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ModelsCurrency::create([

            "name"=>"United Status",
            "code"=>"$",
            "is_default"=>"1",
            "active"=>"1",
            "value_in_dular"=>"1",



        ]);

    }
}

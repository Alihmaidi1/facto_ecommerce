<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\header as headerModels;
class header extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        headerModels::create([

            "language"=>1,
            "currency"=>1,
            "fix"=>1,
            "logo"=>null
        ]);


    }
}

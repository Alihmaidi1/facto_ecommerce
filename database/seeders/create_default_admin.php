<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class create_default_admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([

            "name"=>"Facto Solution",
            "avatar"=>"",
            "email"=>"facto@gmail.com",
            "password"=>Hash::make("facto"),

        ]);

    }
}

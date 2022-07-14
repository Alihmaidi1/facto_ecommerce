<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\footer as footerModel;
class footer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        footerModel::create([

            "address"=>"example",
            "phone"=>"example",
            "email"=>"example@domain.com",
            "logo_description"=>"example",
            "copy_right"=>"example",
            "social_media_status"=>0,
            "facebook"=>"www.facebook.com",
            "twitter"=>"www.twitter.com",
            "instagram"=>"www.instagram.com",
            "youtube"=>"www.youtube.com",
            "linkedin"=>"www.linkedin.com",
        ]);

    }
}

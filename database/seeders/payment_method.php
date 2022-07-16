<?php

namespace Database\Seeders;

use App\Models\payment_method as ModelsPayment_method;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class payment_method extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ModelsPayment_method::create([
            "status"=>1,
            "name"=>"Paypal",
        ]);

        ModelsPayment_method::create([
            "status"=>1,
            "name"=>"mastercard",
        ]);

        ModelsPayment_method::create([
            "status"=>1,
            "name"=>"visa",
        ]);

    }
}

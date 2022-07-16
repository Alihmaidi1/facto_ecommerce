<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\header ;
use Database\Seeders\footer ;
use Database\Seeders\create_default_admin;
use Database\Seeders\currency;
use Database\Seeders\nav;
use Database\Seeders\payment_method;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([header::class]);
        $this->call([footer::class]);
        $this->call([create_default_admin::class]);
        $this->call([currency::class]);
        $this->call([nav::class]);
        $this->call([payment_method::class]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

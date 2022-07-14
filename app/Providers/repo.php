<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\repo\classes\User as userclass;
use App\repo\interfaces\User as userinterface;
class repo extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind("App\\repo\interfaces\User","App\\repo\classes\User");
        $this->app->bind("App\\repo\interfaces\category","App\\repo\classes\category");
        $this->app->bind("App\\repo\interfaces\brand","App\\repo\classes\brand");
        $this->app->bind("App\\repo\interfaces\currency","App\\repo\classes\currency");
        $this->app->bind("App\\repo\interfaces\slider","App\\repo\classes\slider");
        $this->app->bind("App\\repo\interfaces\country","App\\repo\classes\country");
        $this->app->bind("App\\repo\interfaces\city","App\\repo\classes\city");
        $this->app->bind("App\\repo\interfaces\\news","App\\repo\classes\\news");
        $this->app->bind("App\\repo\interfaces\banner","App\\repo\classes\banner");
        $this->app->bind("App\\repo\interfaces\seo","App\\repo\classes\seo");
        $this->app->bind("App\\repo\interfaces\header","App\\repo\classes\header");
        $this->app->bind("App\\repo\interfaces\\footer","App\\repo\classes\\footer");
        $this->app->bind("App\\repo\interfaces\\pages","App\\repo\classes\\pages");
        $this->app->bind("App\\repo\interfaces\color","App\\repo\classes\color");
        $this->app->bind("App\\repo\interfaces\property","App\\repo\classes\property");
        $this->app->bind("App\\repo\interfaces\product","App\\repo\classes\product");
        $this->app->bind("App\\repo\interfaces\copon","App\\repo\classes\copon");


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

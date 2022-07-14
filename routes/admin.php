<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\account;
use App\Http\Controllers\admin\dashboard;
use App\Http\Controllers\admin\category;
use App\Http\Controllers\admin\brand;
use App\Http\Controllers\admin\currency;
use App\Http\Controllers\admin\country;
use App\Http\Controllers\admin\setting\slider;
use App\Http\Controllers\admin\city;
use App\Http\Controllers\admin\seo;
use App\Http\Controllers\admin\news;
use App\Http\Controllers\admin\banner;
use App\Http\Controllers\admin\header;
use App\Http\Controllers\admin\footer;
use App\Http\Controllers\admin\color;
use App\Http\Controllers\admin\property;
use App\Http\Controllers\admin\page;

use App\Http\Controllers\admin\product;
use App\Http\Controllers\admin\copon;
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){ //...


    Route::group(["prefix"=>"admin"],function(){


        Route::group(["middleware"=>['guest']],function(){


            Route::get("/login",[account::class,"login_form"])->name("admin.form_login");
            Route::post("post_login",[account::class,"login"])->name("admin.login");


        });


        Route::group(['middleware'=>['auth']],function (){


        Route::get("admin.logout",[account::class,"logout"])->name("admin.logout");
        Route::get("show.profile",[account::class,"profile"])->name("show.profile");
        Route::post("admin.update.profile",[account::class,"update_profile"])->name("admin.update.profile");





        Route::get("admin.dashboard",[dashboard::class,"index"])->name("admin.dashboard");

        Route::get("show_category",[category::class,"index"])->name("show_category");
        Route::get("add_category",[category::class,"create"])->name("add_category");
        Route::post("category.store",[category::class,"store"])->name("category.store");
        Route::get("categories.edit/{id}",[category::class,"edit"])->name("categories.edit");
        Route::get("categories.destroy/{id}",[category::class,"delete"])->name("categories.destroy");
        Route::post("category.update",[category::class,"update"])->name("category.update");


        Route::get("show_brand",[brand::class,"index"])->name("show_brand");
        Route::get("add_brand",[brand::class,"create"])->name("add_brand");
        Route::post("brand.store",[brand::class,"store"])->name("brand.store");
        Route::get("brands.edit/{id}",[brand::class,"edit"])->name("brands.edit");
        Route::get("brands.destroy/{id}",[brand::class,"delete"])->name("brands.destroy");
        Route::post("brand.update",[brand::class,"update"])->name("brand.update");


        Route::get("show_currency",[currency::class,"index"])->name("show_currency");
        Route::get("add_currency",[currency::class,"create"])->name("currency.create");
        Route::post("currency.store",[currency::class,"store"])->name("currency.store");
        Route::post("currency.default",[currency::class,"default"])->name("currency.default");
        Route::get("currency.edit/{id}",[currency::class,"edit"])->name("currency.edit");
        Route::post("currency.update",[currency::class,"update"])->name("currency.update");
        Route::get("currency.delete/{id}",[currency::class,"delete"])->name("currency.delete");



        Route::get("slider.show",[slider::class,"index"])->name("slider.show");
        Route::get("slider.create",[slider::class,"create"])->name("slider.create");
        Route::post("slider.store",[slider::class,"store"])->name("slider.store");
        Route::get("slider.edit/{id}",[slider::class,"edit"])->name("slider.edit");
        Route::post("slider.update",[slider::class,"update"])->name("slider.update");
        Route::get("slider.destroy/{id}",[slider::class,"delete"])->name("slider.destroy");


        Route::get("country.show",[country::class,"index"])->name("country.show");
        Route::get("country.create",[country::class,"create"])->name("country.create");
        Route::post("country.store",[country::class,"store"])->name("country.store");
        Route::get("country.edit/{id}",[country::class,"edit"])->name("country.edit");
        Route::post("country.update",[country::class,"update"])->name("country.update");
        Route::get("country.delete/{id}",[country::class,"delete"])->name("country.delete");


        Route::get("city.show",[city::class,"index"])->name("city.show");
        Route::get("city.create",[city::class,"create"])->name("city.create");
        Route::post("city.store",[city::class,"store"])->name("city.store");
        Route::get("city.edit/{id}",[city::class,"edit"])->name("city.edit");
        Route::post("city.update",[city::class,"update"])->name("city.update");
        Route::get("city.delete/{id}",[city::class,"delete"])->name("city.delete");



        Route::get("news.show",[news::class,"index"])->name("news.show");
        Route::get("new.create",[news::class,"create"])->name("new.create");
        Route::post("new.store",[news::class,"store"])->name("new.store");
        Route::get("news.edit/{id}",[news::class,"edit"])->name("news.edit");
        Route::post("new.update",[news::class,"update"])->name("new.update");
        Route::get("news.delete/{id}",[news::class,"delete"])->name("news.delete");



        Route::get("banner.show",[banner::class,"index"])->name("banner.show");
        Route::get("banner.create",[banner::class,"create"])->name("banner.create");
        Route::post("banner.store",[banner::class,"store"])->name("banner.store");
        Route::get("banner.edit/{id}",[banner::class,"edit"])->name("banner.edit");
        Route::post("banner.update",[banner::class,"update"])->name("banner.update");
        Route::get("banner.destroy/{id}",[banner::class,"delete"])->name("banner.destroy");



        Route::get("seo.show",[seo::class,"index"])->name("seo.show");
        Route::get("seo.create",[seo::class,"create"])->name("seo.create");
        Route::post("seo.store",[seo::class,"store"])->name("seo.store");
        Route::get("seo.edit/{id}",[seo::class,"edit"])->name("seo.edit");
        Route::post("seo.update",[seo::class,"update"])->name("seo.update");
        Route::get("seo.delete/{id}",[seo::class,"delete"])->name("seo.delete");



        Route::get("show.header",[header::class,"index"])->name("show.header");
        Route::post("header.store",[header::class,"store"])->name("header.store");


        Route::get("show.footer",[footer::class,"index"])->name("show.footer");
        Route::post("footer.updatelogo",[footer::class,"updatelogo"])->name("footer.updatelogo");
        Route::post("footer.updatecontact",[footer::class,"updatecontact"])->name("footer.updatecontact");
        Route::post("footer.updatenav",[footer::class,"updatenav"])->name("footer.updatenav");
        Route::post("footer.updatesocial",[footer::class,"updatesocial"])->name("footer.updatesocial");




        Route::get("show.pages",[page::class,"index"])->name("show.pages");
        Route::get("page.create",[page::class,"create"])->name("page.create");
        Route::post("page.store",[page::class,"store"])->name("page.store");
        Route::get("page.edit/{id}",[page::class,"edit"])->name("page.edit");
        Route::post("page.update",[page::class,"update"])->name("page.update");
        Route::get("page.delete/{id}",[page::class,"delete"])->name("page.delete");




        Route::get("color.show",[color::class,"index"])->name("color.show");
        Route::post("color.store",[color::class,"store"])->name("color.store");
        Route::get("color.edit/{id}",[color::class,"edit"])->name("color.edit");
        Route::post("color.update",[color::class,"update"])->name("color.update");



        Route::get("property.show",[property::class,"index"])->name("property.show");
        Route::post("property.store",[property::class,"store"])->name("property.store");
        Route::get("property.edit/{id}",[property::class,"edit"])->name("property.edit");
        Route::post("property.update",[property::class,"update"])->name("property.update");
        Route::get("property.delete/{id}",[property::class,"delete"])->name("property.delete");
        Route::get("property.value/{id}",[property::class,"show_value"])->name("property.value");
        Route::post("property_value.store",[property::class,"value_store"])->name("property_value.store");
        Route::get("value.edit/{id}",[property::class,"value_edit"])->name("value.edit");
        Route::post("value.update",[property::class,"value_update"])->name("value.update");
        Route::get("value.delete/{id}",[property::class,"value_delete"])->name("value.delete");



        Route::get("product.show",[product::class,"index"])->name("product.show");
        Route::get("product.create",[product::class,"create"])->name("product.create");
        Route::post("product.get_attribute",[product::class,"get_attribute"])->name("product.get_attribute");
        Route::post("product.store",[product::class,"store"])->name("product.store");
        Route::get("product.edit/{id}",[product::class,"edit"])->name("product.edit");
        Route::post("product.update",[product::class,"update"])->name("product.update");
        Route::get("product.delete/{id}",[product::class,"delete"])->name("product.delete");



        Route::get("copon.show",[copon::class,"index"])->name("copon.show");
        Route::get("copon.create",[copon::class,"create"])->name("copon.create");
        Route::post("copon.store",[copon::class,"store"])->name("copon.store");
        Route::get("copon.edit/{id}",[copon::class,"edit"])->name("copon.edit");
        Route::post("copon.update",[copon::class,"update"])->name("copon.update");
        Route::get("copon.destroy/{id}",[copon::class,"delete"])->name("copon.destroy");


        });





    });







});





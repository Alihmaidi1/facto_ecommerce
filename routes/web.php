<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\dashboard;
use App\Http\Controllers\front\category;
use App\Http\Controllers\front\brand;
use App\Http\Controllers\front\flash;
use App\Http\Controllers\front\product;
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){



    Route::get("/",[dashboard::class,"index"]);
    Route::get("user_show.category",[category::class,"index"])->name("user_show.category");
    Route::get("/all_brands",[brand::class,"index"])->name("user.all_brand");
    Route::get("all_flash",[flash::class,"index"])->name("user.all_flash");
    Route::get("/flash/{id}",[flash::class,"single"])->name("user.single_flash");
    Route::get("user.single_category/{id}",[category::class,"single"])->name("user.single_category");
    Route::get("user.show_product/{id}",[product::class,"single"])->name("user.show_product");

});










Route::get('/', function () {
    return view('welcome');
});

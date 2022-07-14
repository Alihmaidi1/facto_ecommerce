<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->integer("quantity");
            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade")->onUpdate("cascade");
            $table->integer("rate")->nullable();
            $table->unsignedBigInteger("brand_id");
            $table->foreign("brand_id")->references("id")->on("brands")->onDelete("cascade")->onUpdate("cascade");
            $table->integer("price");
            $table->unsignedBigInteger("currency_id");
            $table->foreign("currency_id")->references("id")->on("currencies")->onDelete("cascade")->onUpdate("cascade");
            $table->string("tag");
            $table->integer("warning_count");
            $table->string("thumbnail");
            $table->integer("minimum_quantity");
            $table->boolean("vedio_link")->nullable();
            $table->string("meta_title");
            $table->text("meta_description");
            $table->string("meta_logo");
            $table->boolean("free_shipping");
            $table->integer("time_delivery");
            $table->integer("tax");
            $table->integer("selling_number")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

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
        Schema::create('property_product_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_property_id");
            $table->foreign("product_property_id")->references("id")->on("product_properties")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("value_id");
            $table->foreign("value_id")->references("id")->on("values_properties")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('property_product_values');
    }
};

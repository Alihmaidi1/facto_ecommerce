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
        Schema::create('values_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("property_id");
            $table->foreign("property_id")->references("id")->on("property_products")->onDelete("cascade")->onUpdate("cascade");
            $table->string("value");
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
        Schema::dropIfExists('values_properties');
    }
};

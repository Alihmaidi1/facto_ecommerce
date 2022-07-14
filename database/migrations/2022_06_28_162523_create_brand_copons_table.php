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
        Schema::create('brand_copons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("copon_id");
            $table->foreign("copon_id")->references("id")->on("copons")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("brand_id");
            $table->foreign("brand_id")->references("id")->on("brands")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('brand_copons');
    }
};

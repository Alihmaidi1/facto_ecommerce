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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("parent")->nullable();
            $table->foreign("parent")->references("id")->on("categories")->onDelete("cascade")->onUpdate("cascade");
            $table->boolean("status");
            $table->integer("rank");
            $table->string("logo");
            $table->boolean("show_in_main");
            $table->boolean("show_in_header");
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
        Schema::dropIfExists('categories');
    }
};

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
        Schema::create('join_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('game_id');
            $table->unsignedInteger('category_id');
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('game');
            $table->foreign('category_id')->references('id')->on('category');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('join_categories');
    }
};

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
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
    public function up()
    {
        Schema::create('users',function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('email',255)->nullable(false)->unique('email');
            $table->string('password',255)->nullable(false)->unique();
            $table->string('fname',255)->nullable(false);
            $table->string('lname',255)->nullable(false);
            $table->string('login',255)->nullable(false);
            $table->date('date')->nullable(false);
            $table->string('remember_token',100)->nullable(true);
            $table->integer('points')->default(0);
            $table->boolean('admin')->default(0);
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
        Schema::dropIfExists('category');
    }
};

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
        Schema::create('views', function (Blueprint $table) {
          $table->increments('id') ;
          $table->unsignedInteger('user_id');
          $table->integer('user_account_id')->nullable();
          $table->unsignedInteger('category_id')->nullable();
          $table->unsignedInteger('course_id')->nullable();
          $table->unsignedInteger('item_id')->nullable();
          $table->foreign('user_id') ->references('id') ->on('users') ->onDelete('cascade');
          $table->foreign('category_id') ->references('id') ->on('categories') ->onDelete('cascade');
          $table->foreign('course_id') ->references('id') ->on('courses') ->onDelete('cascade');
          $table->foreign('item_id') ->references('id') ->on('items') ->onDelete('cascade');
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
        Schema::dropIfExists('views');
    }
};

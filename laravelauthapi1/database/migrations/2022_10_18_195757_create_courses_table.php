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
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('cateory_id');
            $table->string('title');
            $table->longText('description');
            $table->longText('about_instructor');
            $table->string('playlist_url');
            $table->integer('view_count')->default(0);
            $table->integer('subscriber_count')->default(0);
            $table->string('status')->default(0); 
            $table->string('photo')->nullable();
            $table->softDeletes();
            $table->foreign('view_count') ->references('id') ->on('views');
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
        Schema::dropIfExists('courses');
    }
};

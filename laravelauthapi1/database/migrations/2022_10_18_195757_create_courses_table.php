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
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('cateory_id')->default(0);
            $table->string('title')->default(0);
            $table->longText('description')->default(0);
            $table->longText('about_instructor')->default(0);
            $table->string('playlist_url')->default(0);
            $table->integer('view_count')->default(0);
            $table->integer('subscriber_count')->default(0);
            $table->integer('status')->default(0); 
            $table->string('photo')->nullable();
            $table->softDeletes();
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

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
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('course_id')->nullable();
            $table->integer('view_count')->default(0);
            $table->string('url')->nullable();
            $table->longText('description')->nullable();
            $table->softDeletes();
            $table->foreign('user_id') ->references('id') ->on('users') ->onDelete('cascade');
            $table->foreign('course_id') ->references('id') ->on('courses') ->onDelete('cascade');
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
        Schema::dropIfExists('items');
    }
};

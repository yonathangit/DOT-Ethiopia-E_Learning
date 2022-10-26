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
        Schema::create('course_instructor', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('instructor_id');
            $table->unsignedInteger('course_id');
            $table->integer('user_account_id');
            $table->tinyInteger('status')->default(0);
            $table->softDeletes();
            $table->foreign('instructor_id') ->references('id') ->on('instructors') ->onDelete('cascade');
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
        Schema::dropIfExists('course_instructor');
    }
};

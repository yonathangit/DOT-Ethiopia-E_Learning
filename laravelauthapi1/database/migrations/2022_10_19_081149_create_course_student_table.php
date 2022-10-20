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
        Schema::create('course_student', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('students_id');
            $table->integer('course_id');
            $table->integer('user_account_id');
            $table->tinyInteger('status')->default(0);  
            $table->softDeletes();
            $table->foreign('students_id') ->references('id') ->on('students');
            $table->foreign('course_id') ->references('id') ->on('course');
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
        Schema::dropIfExists('course_student');
    }
};

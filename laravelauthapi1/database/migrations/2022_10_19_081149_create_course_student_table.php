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
            $table->unsignedBigInteger('student_id');
            $table->unsignedInteger('course_id');
            $table->string('status');
            $table->softDeletes();
            $table->foreign('student_id') ->references('id') ->on('students') ->onDelete('cascade');
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
        Schema::dropIfExists('course_student');
    }
};

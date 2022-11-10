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
            $table->unsignedBigInteger('instructor_id');
            $table->unsignedInteger('category_id')->nullable();
            $table->string('photo')->nullable();
            $table->string('title');
            $table->longText('description');
            $table->integer('view_count')->default(0);
            $table->integer('subscriber_count')->default(0);
            $table->string('status')->default(0);
            $table->softDeletes();
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
            $table->foreign('category_id') ->references('id') ->on('categories') ->onDelete('cascade');
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

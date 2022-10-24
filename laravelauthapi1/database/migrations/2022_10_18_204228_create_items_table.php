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
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('url')->nullable();
            $table->unsignedBigInteger('course_id');
            $table->string('course_name');
            $table->foreign('course_id')
                  ->references('id')
                  ->on('courses')
                  ->cascade('delete');
            $table->foreign('course_name')
                  ->references('title')
                  ->on('courses')
                  ->cascade('delete');
            $table->integer('view_count')->default(0);
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
        Schema::dropIfExists('items');
    }
};

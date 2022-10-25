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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('area_of_expertise');
            $table->integer('role')->default(2);
            $table->foreign('user_id') ->references($Instructor->id) ->on('InstructorController') ->onDelete('cascade');
            $table->foreign('role') ->references('role') ->on('user') ->onDelete('cascade');
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
        Schema::dropIfExists('instructors');
    }
};

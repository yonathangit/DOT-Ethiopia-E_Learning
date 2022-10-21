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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('age');
            $table->string('address')->nullable();
            $table->date('date_of_birth'); 
            $table->string('gender'); 
            $table->string('field_of_study');
            $table->bigInteger('phone_number');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger("is_subscribed")->default(3);  //student
            $table->integer('view_count')->default(0);
            $table->rememberToken()->nullable();
            $table->softDeletes()->nullable();
            $table->integer('role_id')->default(3); //1. Admin  2.Instructor 3. Student
            $table->boolean('tc')->nullable();
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
        Schema::dropIfExists('users');
    }
};

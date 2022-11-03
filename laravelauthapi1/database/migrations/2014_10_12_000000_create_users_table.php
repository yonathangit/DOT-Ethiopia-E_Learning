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
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address')->nullable();
            $table->date('date_of_birth')->nullable(); 
            $table->string('gender')->default('male'); 
            $table->string('field_of_study')->nullable();
            $table->string('level_of_study')->nullable();
            $table->bigInteger('phone_number')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('view_count')->default(0);
            $table->unsignedInteger('userable_id')->nullable();
            $table->string('userable_type');
            $table->string('profile_picture')->nullable();
            $table->rememberToken();
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

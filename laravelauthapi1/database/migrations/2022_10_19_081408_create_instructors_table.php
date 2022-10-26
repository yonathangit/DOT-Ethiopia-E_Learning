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
            $table->unsignedInteger('user_id')->nullable();
            $table->string('area_of_expertise');
<<<<<<< HEAD

=======
>>>>>>> ba2a9a571c11f5b8b536f0a0a32be86772368c96
            $table->integer('role')->default(2);
            $table->foreign('user_id') ->references('id') ->on('users') ->onDelete('cascade');
            // $table->foreign('role') ->references('role') ->on('user') ->onDelete('cascade');
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

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
            $table->id();
            $table->string('user_name')->unique();
            $table->string('user_full_name');
            $table->string('user_email')->unique();
            $table->string('user_password');
            $table->string('user_avt')->nullable();
            $table->foreignId('role_id')->constrained('role');
            $table->rememberToken();
            $table->timestamps();

            //$table->foreign('user_id')->references('id')->on('role');
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

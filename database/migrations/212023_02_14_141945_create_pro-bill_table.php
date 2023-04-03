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
        Schema::create('pro-bill', function (Blueprint $table) {
            $table->foreignId('pro_id')->constrained('product');
            $table->foreignId('bill_id')->constrained('bill');
            $table->integer('pro_amount')->default(1);
            $table->decimal('pro_cur_price')->default(0);
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
        Schema::dropIfExists('pro-bill');
    }
};

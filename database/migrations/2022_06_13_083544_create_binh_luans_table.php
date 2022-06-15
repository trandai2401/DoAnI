<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhLuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->id();
            $table->string('noidung');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
  

            $table->unsignedBigInteger('baiviet_id');
            $table->foreign('baiviet_id')->references('id')->on('bai_viets');
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
        Schema::dropIfExists('binh_luans');
    }
}

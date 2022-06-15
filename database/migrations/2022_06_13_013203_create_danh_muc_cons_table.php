<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhMucConsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_muc_cons', function (Blueprint $table) {
            $table->id();
            $table->string('tendanhmuc');
            $table->unsignedBigInteger('danhmuc_id');
            $table->foreign('danhmuc_id')->references('id')->on('danh_mucs');
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
        Schema::dropIfExists('danh_muc_cons');
    }
}

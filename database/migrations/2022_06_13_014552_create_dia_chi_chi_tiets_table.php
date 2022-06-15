<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaChiChiTietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_chi_chi_tiets', function (Blueprint $table) {
            $table->id();
            $table->string('chitiet');
            $table->unsignedBigInteger('baiviet_id');
            $table->foreign('baiviet_id')->references('id')->on('bai_viets');
            $table->unsignedBigInteger('xaphuong_id');
            $table->foreign('xaphuong_id')->references('id')->on('xa_phuongs');
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
        Schema::dropIfExists('dia_chi_chi_tiets');
    }
}

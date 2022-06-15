<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXaPhuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xa_phuongs', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->unsignedBigInteger('quanhuyen_id');
            $table->foreign('quanhuyen_id')->references('id')->on('quan_huyens');
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
        Schema::dropIfExists('xa_phuongs');
    }
}

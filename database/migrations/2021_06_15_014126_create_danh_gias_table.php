<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhGiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_gias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('tai_khoans_id');
            $table->foreign('tai_khoans_id')->references('id')->on('tai_khoans');
            $table->unsignedInteger('san_phams_id');
            $table->foreign('san_phams_id')->references('id')->on('san_phams');
            $table->unsignedInteger('diem');
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
        Schema::dropIfExists('danh_gias');
    }
}

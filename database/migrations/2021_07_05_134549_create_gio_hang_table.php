<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGioHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gio_hangs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tai_khoans_id');
            $table->foreign('tai_khoans_id')->references('id')->on('tai_khoans');
            $table->unsignedInteger('chi_tiet_san_phams_id');
            $table->foreign('chi_tiet_san_phams_id')->references('id')->on('chi_tiet_san_phams');
            $table->unsignedInteger('so_luong');
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
        Schema::dropIfExists('gio_hang');
    }
}

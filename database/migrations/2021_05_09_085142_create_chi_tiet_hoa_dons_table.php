<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietHoaDonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_hoa_dons', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('san_phams_id');
            $table->foreign('san_phams_id')->references('id')->on('san_phams');
            $table->unsignedInteger('hoa_dons_id');
            $table->foreign('hoa_dons_id')->references('id')->on('hoa_dons');
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
        Schema::dropIfExists('chi_tiet_hoa_dons');
    }
}

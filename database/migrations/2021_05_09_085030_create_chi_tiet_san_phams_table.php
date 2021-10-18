<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_san_phams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('san_phams_id');
            // $table->foreign('san_phams_id')->references('id')->on('san_phams');
            $table->string('mau', 20)->nullable();
            $table->char('kich_thuoc', 10)->nullable();
            $table->unsignedInteger('so_luong');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_san_phams');
    }
}

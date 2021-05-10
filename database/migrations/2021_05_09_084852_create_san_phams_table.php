<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_san_pham', 50);
            $table->unsignedInteger('nha_san_xuats_id');
            // $table->foreign('nha_san_xuats_id')->references('id')->on('nha_san_xuats');
            $table->unsignedInteger('loai_san_phams_id');
            // $table->foreign('loai_san_phams_id')->references('id')->on('loai_san_phams');
            $table->unsignedInteger('mon_the_thaos_id');
            // $table->foreign('mon_the_thaos_id')->references('id')->on('mon_the_thaos');
            $table->unsignedBigInteger('gia_ban');
            $table->unsignedInteger('giam_gia')->nullable();
            $table->text('mo_ta')->nullable();
            $table->boolean('trang_thai')->default(true);
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
        Schema::dropIfExists('san_phams');
    }
}

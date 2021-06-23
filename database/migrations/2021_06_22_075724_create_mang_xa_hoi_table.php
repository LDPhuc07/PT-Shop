<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMangXaHoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mang_xa_hoi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mang_xa_hoi_id');
            $table->string('mang_xa_hoi');
            $table->unsignedInteger('tai_khoans_id');
            $table->foreign('tai_khoans_id')->references('id')->on('tai_khoans');
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
        Schema::dropIfExists('mang_xa_hoi');
    }
}

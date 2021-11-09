<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoaDonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('hoa_dons', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('tai_khoans_id')->nullable();
        //     $table->string('ho_ten', 50);
        //     $table->char('so_dien_thoai', 10)->nullable();
        //     $table->string('dia_chi')->nullable();
        //     // $table->foreign('tai_khoans_id')->references('id')->on('tai_khoans');
        //     $table->dateTime('ngay_lap_hd');
        //     $table->unsignedBigInteger('tong_tien')->nullable();
        //     $table->BigInteger('loi_nhuan')->nullable();
        //     $table->int('trang_thai_don_hang')->default(1);
        //     $table->boolean('hinh_thuc_thanh_toan')->default(false);
        //     $table->timestamps();
        // });


        Schema::create('hoa_dons', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('tai_khoans_id');
          // $table->foreign('tai_khoans_id')->references('id')->on('tai_khoans');
          $table->dateTime('ngay_lap_hd');
          $table->unsignedBigInteger('tong_tien')->nullable();
          $table->BigInteger('loi_nhuan')->nullable();
          $table->boolean('trang_thai')->default(true);
          $table->boolean('chot_don')->default(false);
          $table->boolean('hinh_thuc_thanh_toan')->default(false);
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
        Schema::dropIfExists('hoa_dons');
    }
}


// 
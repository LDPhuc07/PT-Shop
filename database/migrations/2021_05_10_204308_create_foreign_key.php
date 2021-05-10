<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('foreign_key', function (Blueprint $table) {
            
        // });
        Schema::table('san_phams',function (Blueprint $table){
            $table->foreign('nha_san_xuats_id')->references('id')->on('nha_san_xuats');
            $table->foreign('loai_san_phams_id')->references('id')->on('loai_san_phams');
            $table->foreign('mon_the_thaos_id')->references('id')->on('mon_the_thaos');
        });
        Schema::table('chi_tiet_san_phams',function (Blueprint $table){
            $table->foreign('san_phams_id')->references('id')->on('san_phams');
        });
        Schema::table('anhs',function (Blueprint $table){
            $table->foreign('san_phams_id')->references('id')->on('san_phams');
        });
        Schema::table('hoa_dons',function (Blueprint $table){
            $table->foreign('tai_khoans_id')->references('id')->on('tai_khoans');
        });
        Schema::table('chi_tiet_hoa_dons',function (Blueprint $table){
            $table->foreign('san_phams_id')->references('id')->on('san_phams');
            $table->foreign('hoa_dons_id')->references('id')->on('hoa_dons');
        });
        //tạo khoa ngoại sau cung để ko bị lỗi hồi giwfo toàn làm xong xong k à :(
        // Thì giờ rút kinh nghiệm
        // coi xóa mấy cái seeder ko cân thiể add lại khóa ngoại vao đay
        //migrate lại rồi seed lại luôn l vậy giờ xóa mấy cái dư truosc ham,
        // xóa mấy cái seeder có số 1 
        //add lại khóa ngoại vào đây
        //migrate lại seed lại luôn à ok
        //kokee
        //trả máy
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_key');
    }
}

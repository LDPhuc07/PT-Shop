<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaiKhoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tai_khoans', function (Blueprint $table) {
            $table->increments('id');
            $table->char('anh_dai_dien')->nullable();
            $table->string('ho_ten', 50);
            $table->char('email', 50)->unique('email')->nullable();
            $table->char('password')->nullable();;
            $table->char('so_dien_thoai', 10)->unique('so_dien_thoai')->nullable();
            $table->string('dia_chi')->nullable();
            $table->boolean('admin');
            $table->char('remember_token')->nullable();
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
        Schema::dropIfExists('tai_khoans');
    }
}

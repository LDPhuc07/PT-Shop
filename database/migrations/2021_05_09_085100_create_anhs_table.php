<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anhs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('san_phams_id');
            // $table->foreign('san_phams_id')->references('id')->on('san_phams');
            $table->boolean('anhchinh')->default(false);
            $table->char('anhchitiet')->nullable();
            $table->char('link')->nullable();
            $table->boolean('trang_thai')->default(true);
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
        Schema::dropIfExists('anhs');
    }
}

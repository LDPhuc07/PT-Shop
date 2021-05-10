<?php

use Illuminate\Database\Seeder;

class MonTheThaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('mon_the_thaos')->insert([
            ['id'=> 1, 'ten_the_thao'=>'bóng đá', 'trang_thai'=>true],
            ['id'=> 2, 'ten_the_thao'=>'bóng rổ', 'trang_thai'=>true],
            ['id'=> 3, 'ten_the_thao'=>'quần vợt', 'trang_thai'=>true],
            ['id'=> 4, 'ten_the_thao'=>'bóng chày', 'trang_thai'=>true],
            ['id'=> 5, 'ten_the_thao'=>'cầu lông', 'trang_thai'=>true],
            ['id'=> 6, 'ten_the_thao'=>'gôn', 'trang_thai'=>true],
            ['id'=> 7, 'ten_the_thao'=>'bơi lội', 'trang_thai'=>true],
            ['id'=> 8, 'ten_the_thao'=>'gym', 'trang_thai'=>true],
            ['id'=> 9, 'ten_the_thao'=>'chạy', 'trang_thai'=>true],
            ['id'=> 10, 'ten_the_thao'=>'bóng chuyền', 'trang_thai'=>true],
        ]);
    }
}

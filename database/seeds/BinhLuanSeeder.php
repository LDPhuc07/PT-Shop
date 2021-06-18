<?php

use Illuminate\Database\Seeder;

class BinhLuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('binh_luans')->insert([
            ['id'=> 1,'san_phams_id'=>1, 'tai_khoans_id'=> 4,'noi_dung'=>'cái áo này đẹp quá quí zị', 'trang_thai'=>true],
            ['id'=> 2,'san_phams_id'=>1, 'tai_khoans_id'=> 4,'noi_dung'=>'cái áo này đẹp quá quí zị', 'trang_thai'=>true],
            ['id'=> 3,'san_phams_id'=>1, 'tai_khoans_id'=> 6,'noi_dung'=>'cái áo này đẹp quá quí zị', 'trang_thai'=>true],
            ['id'=> 4,'san_phams_id'=>1, 'tai_khoans_id'=> 6,'noi_dung'=>'cái áo này đẹp quá quí zị', 'trang_thai'=>true],
            ['id'=> 5,'san_phams_id'=>2, 'tai_khoans_id'=> 5,'noi_dung'=>'cái áo này đẹp quá quí zị', 'trang_thai'=>true],
            ['id'=> 6,'san_phams_id'=>2, 'tai_khoans_id'=> 5,'noi_dung'=>'cái áo này đẹp quá quí zị', 'trang_thai'=>true],
            ['id'=> 7,'san_phams_id'=>2, 'tai_khoans_id'=> 3,'noi_dung'=>'cái áo này đẹp quá quí zị', 'trang_thai'=>true],
            ['id'=> 8,'san_phams_id'=>2, 'tai_khoans_id'=> 3,'noi_dung'=>'cái áo này đẹp quá quí zị', 'trang_thai'=>true],
            ['id'=> 9,'san_phams_id'=>2, 'tai_khoans_id'=> 3,'noi_dung'=>'cái áo này đẹp quá quí zị', 'trang_thai'=>true],
            ['id'=> 10,'san_phams_id'=>1, 'tai_khoans_id'=> 3,'noi_dung'=>'cái áo này đẹp quá quí zị', 'trang_thai'=>true],
        ]);
    }
}

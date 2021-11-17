<?php

use Illuminate\Database\Seeder;

class DanhGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('danh_gias')->insert([
            ['id'=> 1,'tai_khoans_id'=> 4, 'san_phams_id'=> 15,'diem'=>5],
            ['id'=> 2,'tai_khoans_id'=> 6, 'san_phams_id'=> 20,'diem'=>5],
            ['id'=> 3,'tai_khoans_id'=> 10, 'san_phams_id'=> 4,'diem'=>4],
            ['id'=> 4,'tai_khoans_id'=> 6, 'san_phams_id'=> 20,'diem'=>5],
            ['id'=> 5,'tai_khoans_id'=> 6, 'san_phams_id'=> 7,'diem'=>3],
            ['id'=> 6,'tai_khoans_id'=> 3, 'san_phams_id'=> 13,'diem'=>4],
            ['id'=> 7,'tai_khoans_id'=> 4, 'san_phams_id'=> 16,'diem'=>5],
            ['id'=> 8,'tai_khoans_id'=> 4, 'san_phams_id'=> 16,'diem'=>3],
            ['id'=> 9,'tai_khoans_id'=> 5, 'san_phams_id'=> 18,'diem'=>4],
            ['id'=> 10,'tai_khoans_id'=> 9, 'san_phams_id'=> 8,'diem'=>5],
        ]);
    }
}
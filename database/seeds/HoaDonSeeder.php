<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HoaDonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hoa_dons')->insert([
            ['id'=> 1, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-01-02', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 2, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-02-03', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 3, 'tai_khoans_id'=> 10,'ngay_lap_hd'=>'2021-03-04', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 4, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-04-04', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 5, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-05-30', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 6, 'tai_khoans_id'=> 3,'ngay_lap_hd'=>'2021-06-23', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 7, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-07-05', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 8, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-08-03', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 9, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-09-21', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 10, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-10-12', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 12, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-11-08', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 13, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-01-01', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 14, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-02-17', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 15, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-03-15', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 16, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-04-15', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 17, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-05-16', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 18, 'tai_khoans_id'=> 8,'ngay_lap_hd'=>'2021-06-20', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 19, 'tai_khoans_id'=> 8,'ngay_lap_hd'=>'2021-07-01', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 20, 'tai_khoans_id'=> 10,'ngay_lap_hd'=>'2021-08-09', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 21, 'tai_khoans_id'=> 10,'ngay_lap_hd'=>'2021-09-29', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 22, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-10-06', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 23, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-11-01', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>true],
            
            ['id'=> 24, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-01-25', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 25, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-02-20', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 26, 'tai_khoans_id'=> 8,'ngay_lap_hd'=>'2021-10-24', 'chot_don'=>'l', 'hinh_thuc_thanh_toan'=>false],

            ['id'=> 27, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-10-25', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 28, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-10-26', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 29, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-10-27', 'chot_don'=>'l', 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 30, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-10-28', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],

            ['id'=> 31, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-10-29', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 32, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-10-30', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],

            ['id'=> 33, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-10-31', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 34, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-11-01', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 35, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-11-02', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 36, 'tai_khoans_id'=> 10,'ngay_lap_hd'=>'2021-11-03', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 37, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-11-04', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 38, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-11-05', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 39, 'tai_khoans_id'=> 3,'ngay_lap_hd'=>'2021-11-06', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 40, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-11-07', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 41, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-11-08', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 42, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-11-09', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 43, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-11-10', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            // ['id'=> 44, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-11-11', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 45, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-11-12', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 46, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-11-13', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 47, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-11-14', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 48, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-11-15', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 49, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-11-16', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 50, 'tai_khoans_id'=> 8,'ngay_lap_hd'=>'2021-11-17', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 51, 'tai_khoans_id'=> 8,'ngay_lap_hd'=>'2021-11-01', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 52, 'tai_khoans_id'=> 10,'ngay_lap_hd'=>'2021-11-02', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 53, 'tai_khoans_id'=> 10,'ngay_lap_hd'=>'2021-11-03', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 54, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-11-04', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 55, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-11-05', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>true],
            
            ['id'=> 56, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-11-06', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 57, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-11-07', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 58, 'tai_khoans_id'=> 8,'ngay_lap_hd'=>'2021-11-08', 'chot_don'=>'l', 'hinh_thuc_thanh_toan'=>false],

            // ['id'=> 59, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-11-09', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            // ['id'=> 60, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-11-10', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 61, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-11-11', 'chot_don'=>'l', 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 62, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-11-12', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],

            // ['id'=> 63, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-11-13', 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 64, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-11-14', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],

            // ['id'=> 65, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-11-15', 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false]
        ]);
    }
}

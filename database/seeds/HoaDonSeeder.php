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
            ['id'=> 1, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-01-02', 'tong_tien'=>25000, 'loi_nhuan'=>5000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 2, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-02-03', 'tong_tien'=>216000, 'loi_nhuan'=>16000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 3, 'tai_khoans_id'=> 10,'ngay_lap_hd'=>'2021-03-04', 'tong_tien'=>8000000, 'loi_nhuan'=>1000000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 4, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-04-04', 'tong_tien'=>324000, 'loi_nhuan'=>24000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 5, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-05-30', 'tong_tien'=>7000000, 'loi_nhuan'=>1000000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 6, 'tai_khoans_id'=> 3,'ngay_lap_hd'=>'2021-06-23', 'tong_tien'=>4050000, 'loi_nhuan'=>50000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 7, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-07-05', 'tong_tien'=>2550000, 'loi_nhuan'=>550000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 8, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-08-03', 'tong_tien'=>2550000, 'loi_nhuan'=>550000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 9, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-09-21', 'tong_tien'=>1500000, 'loi_nhuan'=>500000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 10, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-10-12', 'tong_tien'=>9000000, 'loi_nhuan'=>1000000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 12, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-11-08', 'tong_tien'=>7000000, 'loi_nhuan'=>1000000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 13, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-01-01', 'tong_tien'=>480000, 'loi_nhuan'=>180000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 14, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-02-17', 'tong_tien'=>14000000, 'loi_nhuan'=>2000000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 15, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-03-15', 'tong_tien'=>750000, 'loi_nhuan'=>150000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 16, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-04-15', 'tong_tien'=>150000, 'loi_nhuan'=>30000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 17, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-05-16', 'tong_tien'=>2400000, 'loi_nhuan'=>400000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 18, 'tai_khoans_id'=> 8,'ngay_lap_hd'=>'2021-06-20', 'tong_tien'=>640000, 'loi_nhuan'=>240000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 19, 'tai_khoans_id'=> 8,'ngay_lap_hd'=>'2021-07-01', 'tong_tien'=>8000000, 'loi_nhuan'=>1000000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 20, 'tai_khoans_id'=> 10,'ngay_lap_hd'=>'2021-08-09', 'tong_tien'=>8000000, 'loi_nhuan'=>1000000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 21, 'tai_khoans_id'=> 10,'ngay_lap_hd'=>'2021-09-29', 'tong_tien'=>1600000, 'loi_nhuan'=>400000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 22, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-10-06', 'tong_tien'=>7000000, 'loi_nhuan'=>1000000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 23, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-11-01', 'tong_tien'=>750000, 'loi_nhuan'=>150000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>true],
            
            ['id'=> 24, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-01-25', 'tong_tien'=>1275000, 'loi_nhuan'=>275000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 25, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-02-20', 'tong_tien'=>320000, 'loi_nhuan'=>120000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 26, 'tai_khoans_id'=> 8,'ngay_lap_hd'=>'2021-10-24', 'tong_tien'=>125000, 'loi_nhuan'=>25000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],

            ['id'=> 27, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-10-25', 'tong_tien'=>3600000, 'loi_nhuan'=>600000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 28, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-10-26', 'tong_tien'=>4950000, 'loi_nhuan'=>950000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 29, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-10-27', 'tong_tien'=>11500000, 'loi_nhuan'=>2500000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 30, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-10-28', 'tong_tien'=>9648000, 'loi_nhuan'=>1048000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],

            ['id'=> 31, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-10-29', 'tong_tien'=>6525000, 'loi_nhuan'=>1700000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 32, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-10-30', 'tong_tien'=>27000000, 'loi_nhuan'=>5000000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],

            ['id'=> 33, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-10-31', 'tong_tien'=>5280000, 'loi_nhuan'=>980000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 34, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-11-01', 'tong_tien'=>34000000, 'loi_nhuan'=>6000000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 35, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-11-02', 'tong_tien'=>32750000, 'loi_nhuan'=>4150000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 36, 'tai_khoans_id'=> 10,'ngay_lap_hd'=>'2021-11-03', 'tong_tien'=>3350000, 'loi_nhuan'=>920000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 37, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-11-04', 'tong_tien'=>12400000, 'loi_nhuan'=>2400000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 38, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-11-05', 'tong_tien'=>5440000, 'loi_nhuan'=>1040000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 39, 'tai_khoans_id'=> 3,'ngay_lap_hd'=>'2021-11-06', 'tong_tien'=>17000000, 'loi_nhuan'=>2000000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 40, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-11-07', 'tong_tien'=>36000000, 'loi_nhuan'=>5000000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 41, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-11-08', 'tong_tien'=>1625000, 'loi_nhuan'=>405000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 42, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-11-09', 'tong_tien'=>216000, 'loi_nhuan'=>16000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 43, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-11-10', 'tong_tien'=>8000000, 'loi_nhuan'=>1000000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            // ['id'=> 44, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-11-11', 'tong_tien'=>324000, 'loi_nhuan'=>24000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 45, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-11-12', 'tong_tien'=>7000000, 'loi_nhuan'=>1000000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 46, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-11-13', 'tong_tien'=>4050000, 'loi_nhuan'=>50000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 47, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-11-14', 'tong_tien'=>2550000, 'loi_nhuan'=>550000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 48, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-11-15', 'tong_tien'=>2550000, 'loi_nhuan'=>550000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 49, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-11-16', 'tong_tien'=>1500000, 'loi_nhuan'=>500000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 50, 'tai_khoans_id'=> 8,'ngay_lap_hd'=>'2021-11-17', 'tong_tien'=>9000000, 'loi_nhuan'=>1000000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 51, 'tai_khoans_id'=> 8,'ngay_lap_hd'=>'2021-11-01', 'tong_tien'=>25000, 'loi_nhuan'=>5000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 52, 'tai_khoans_id'=> 10,'ngay_lap_hd'=>'2021-11-02', 'tong_tien'=>7216000, 'loi_nhuan'=>116000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 53, 'tai_khoans_id'=> 10,'ngay_lap_hd'=>'2021-11-03', 'tong_tien'=>8750000, 'loi_nhuan'=>1150000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            ['id'=> 54, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-11-04', 'tong_tien'=>1599000, 'loi_nhuan'=>299000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 55, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-11-05', 'tong_tien'=>7320000, 'loi_nhuan'=>1120000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>true],
            
            ['id'=> 56, 'tai_khoans_id'=> 6,'ngay_lap_hd'=>'2021-11-06', 'tong_tien'=>4175000, 'loi_nhuan'=>75000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>true],
            ['id'=> 57, 'tai_khoans_id'=> 4,'ngay_lap_hd'=>'2021-11-07', 'tong_tien'=>6150000, 'loi_nhuan'=>1150000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 58, 'tai_khoans_id'=> 8,'ngay_lap_hd'=>'2021-11-08', 'tong_tien'=>1390000, 'loi_nhuan'=>390000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],

            // ['id'=> 59, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-11-09', 'tong_tien'=>8150000, 'loi_nhuan'=>1030000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>true],
            // ['id'=> 60, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-11-10', 'tong_tien'=>10400000, 'loi_nhuan'=>1400000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 61, 'tai_khoans_id'=> 7,'ngay_lap_hd'=>'2021-11-11', 'tong_tien'=>1725000, 'loi_nhuan'=>425000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 62, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-11-12', 'tong_tien'=>14000000, 'loi_nhuan'=>2000000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],

            // ['id'=> 63, 'tai_khoans_id'=> 9,'ngay_lap_hd'=>'2021-11-13', 'tong_tien'=>480000, 'loi_nhuan'=>180000, 'chot_don'=>true, 'hinh_thuc_thanh_toan'=>false],
            // ['id'=> 64, 'tai_khoans_id'=> 5,'ngay_lap_hd'=>'2021-11-14', 'tong_tien'=>14000000, 'loi_nhuan'=>2000000, 'chot_don'=>false, 'hinh_thuc_thanh_toan'=>false],

        ]);
    }
}

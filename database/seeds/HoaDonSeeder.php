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
            ['id'=> 1, 'tai_khoans_id'=> 1, 'ngay_lap_hd'=>Carbon::now(), 'tong_tien'=>10000000,'loi_nhuan'=>null, 'trang_thai'=>true],
            ['id'=> 2, 'tai_khoans_id'=> 1, 'ngay_lap_hd'=>Carbon::create(2021, 11, 11, 0, 0, 0), 'tong_tien'=>10000000,'loi_nhuan'=>null, 'trang_thai'=>true],
            ['id'=> 3, 'tai_khoans_id'=> 1, 'ngay_lap_hd'=>Carbon::create(2021, 11, 1, 0, 0, 0), 'tong_tien'=>10000000,'loi_nhuan'=>null, 'trang_thai'=>true],
            ['id'=> 4, 'tai_khoans_id'=> 1, 'ngay_lap_hd'=>Carbon::now(), 'tong_tien'=>10000000,'loi_nhuan'=>null, 'trang_thai'=>true],
            ['id'=> 5, 'tai_khoans_id'=> 1, 'ngay_lap_hd'=>Carbon::now(), 'tong_tien'=>10000000,'loi_nhuan'=>null, 'trang_thai'=>true],
            ['id'=> 6, 'tai_khoans_id'=> 3, 'ngay_lap_hd'=>Carbon::create(2020, 1, 6, 0, 0, 0), 'tong_tien'=>10000000,'loi_nhuan'=>null, 'trang_thai'=>true],
            ['id'=> 7, 'tai_khoans_id'=> 3, 'ngay_lap_hd'=>Carbon::create(2020, 1, 5, 0, 0, 0), 'tong_tien'=>10000000,'loi_nhuan'=>null, 'trang_thai'=>true],
            ['id'=> 8, 'tai_khoans_id'=> 3, 'ngay_lap_hd'=>Carbon::create(2020, 1, 4, 0, 0, 0), 'tong_tien'=>10000000,'loi_nhuan'=>null, 'trang_thai'=>true],
            ['id'=> 9, 'tai_khoans_id'=> 3, 'ngay_lap_hd'=>Carbon::now(), 'tong_tien'=>10000000,'loi_nhuan'=>null, 'trang_thai'=>true],
            ['id'=> 10, 'tai_khoans_id'=> 3, 'ngay_lap_hd'=>Carbon::create(2020, 1, 1, 0, 0, 0), 'tong_tien'=>10000000,'loi_nhuan'=>null, 'trang_thai'=>true],
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('san_phams')->insert([
            ['id'=> 1, 'ten_san_pham'=>'adidas 01','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 1, 'mon_the_thaos_id'=> 1, 'gia_ban'=> 1000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 2, 'ten_san_pham'=>'adidas 02','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 1, 'mon_the_thaos_id'=> 1, 'gia_ban'=> 1000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 3, 'ten_san_pham'=>'adidas 03','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 1, 'mon_the_thaos_id'=> 1, 'gia_ban'=> 1000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 4, 'ten_san_pham'=>'adidas 04','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 1, 'mon_the_thaos_id'=> 1, 'gia_ban'=> 1000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 5, 'ten_san_pham'=>'adidas 05','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 1, 'mon_the_thaos_id'=> 1, 'gia_ban'=> 1000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 6, 'ten_san_pham'=>'nike 06','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 2, 'gia_ban'=> 2000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 7, 'ten_san_pham'=>'nike 07','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 2, 'gia_ban'=> 2000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 8, 'ten_san_pham'=>'nike 08','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 2, 'gia_ban'=> 2000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 9, 'ten_san_pham'=>'nike 09','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 2, 'gia_ban'=> 2000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 10, 'ten_san_pham'=>'nike 10','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 2, 'gia_ban'=> 2000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
        ]);
    }
}

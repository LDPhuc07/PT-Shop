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
            ['id'=> 1, 'ten_san_pham'=>'Áo thun','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 5, 'mon_the_thaos_id'=> 9, 'gia_ban'=> 1000000, 'giam_gia'=> null, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 2, 'ten_san_pham'=>'Áo hoodie','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 5, 'mon_the_thaos_id'=> 9, 'gia_ban'=> 1000000, 'giam_gia'=> 10, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 3, 'ten_san_pham'=>'Băng đô','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 10, 'mon_the_thaos_id'=> 3, 'gia_ban'=> 1000000, 'giam_gia'=> null, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 4, 'ten_san_pham'=>'Quần bó','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 4, 'mon_the_thaos_id'=> 9, 'gia_ban'=> 1000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 5, 'ten_san_pham'=>'Tất','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 9, 'mon_the_thaos_id'=> 1, 'gia_ban'=> 1000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 6, 'ten_san_pham'=>'Quần PSG','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 4, 'mon_the_thaos_id'=> 1, 'gia_ban'=> 2000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 7, 'ten_san_pham'=>'Gìay bóng đá','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 1, 'mon_the_thaos_id'=> 1, 'gia_ban'=> 2000000, 'giam_gia'=> null, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 8, 'ten_san_pham'=>'Áo ars','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 5, 'mon_the_thaos_id'=> 1, 'gia_ban'=> 3000000, 'giam_gia'=> null, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 9, 'ten_san_pham'=>'Áo polo','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 5, 'mon_the_thaos_id'=> 6, 'gia_ban'=> 3000000, 'giam_gia'=> 30, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 10, 'ten_san_pham'=>'Cặp','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 6, 'mon_the_thaos_id'=> 1, 'gia_ban'=> 5000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
        ]);
    }
}

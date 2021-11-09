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
            ['id'=> 1, 'ten_san_pham'=>'Áo thun','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 9,'gia_goc'=>100000, 'gia_ban'=> 120000, 'giam_gia'=> null, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 2, 'ten_san_pham'=>'Áo hoodie','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 9,'gia_goc'=>200000, 'gia_ban'=> 250000, 'giam_gia'=> 10, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 3, 'ten_san_pham'=>'Băng đô','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 3, 'mon_the_thaos_id'=> 3,'gia_goc'=>50000, 'gia_ban'=> 60000, 'giam_gia'=> null, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 4, 'ten_san_pham'=>'Quần bó','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 9,'gia_goc'=>200000, 'gia_ban'=> 220000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 5, 'ten_san_pham'=>'Tất','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 3, 'mon_the_thaos_id'=> 1,'gia_goc'=>15000, 'gia_ban'=> 15000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 6, 'ten_san_pham'=>'Quần PSG','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 1,'gia_goc'=>500000, 'gia_ban'=> 540000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 7, 'ten_san_pham'=>'Giày bóng đá','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 1, 'mon_the_thaos_id'=> 1,'gia_goc'=>700000, 'gia_ban'=> 750000, 'giam_gia'=> null, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 8, 'ten_san_pham'=>'Áo ars','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 1,'gia_goc'=>300000, 'gia_ban'=> 320000, 'giam_gia'=> null, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 9, 'ten_san_pham'=>'Áo polo','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 6,'gia_goc'=>100000, 'gia_ban'=> 150000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 10, 'ten_san_pham'=>'Cặp','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 3, 'mon_the_thaos_id'=> 1,'gia_goc'=>200000, 'gia_ban'=> 220000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 11, 'ten_san_pham'=>'Áo Nike trắng bóng','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 3,'gia_goc'=>120000, 'gia_ban'=> 130000, 'giam_gia'=> 20, 'mo_ta'=> 'Hàng chất lượng cao vãi mịn', 'trang_thai'=>true],
            ['id'=> 12, 'ten_san_pham'=>'Áo Nĩ','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 6,'gia_goc'=>200000, 'gia_ban'=> 210000, 'giam_gia'=> null, 'mo_ta'=> 'Hàng chất lượng cao vãi mịn', 'trang_thai'=>true],
            ['id'=> 13, 'ten_san_pham'=>'Bóng ARS','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 3, 'mon_the_thaos_id'=> 1,'gia_goc'=>400000, 'gia_ban'=> 420000, 'giam_gia'=> 10, 'mo_ta'=> 'Bóng chất lượng cao', 'trang_thai'=>true],
            ['id'=> 14, 'ten_san_pham'=>'Quần Jordan','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 9,'gia_goc'=>200000, 'gia_ban'=> 230000, 'giam_gia'=> null, 'mo_ta'=> 'Hàng chất lượng cao vãi mịn', 'trang_thai'=>true],
            ['id'=> 15, 'ten_san_pham'=>'Tất chạy bộ','nha_san_xuats_id'=> 3, 'loai_san_phams_id'=> 3, 'mon_the_thaos_id'=> 9,'gia_goc'=>20000, 'gia_ban'=> 25000, 'giam_gia'=> null, 'mo_ta'=> 'Hàng chất lượng cao vãi mịn', 'trang_thai'=>true],
            ['id'=> 16, 'ten_san_pham'=>'Giày Ultra','nha_san_xuats_id'=> 6, 'loai_san_phams_id'=> 1, 'mon_the_thaos_id'=> 6,'gia_goc'=>1000000, 'gia_ban'=> 1500000, 'giam_gia'=> 15, 'mo_ta'=> 'Giày chất lượng cao, bền, bảo hành 1 năm', 'trang_thai'=>true],
            ['id'=> 17, 'ten_san_pham'=>'Quần sort Adidas','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 3,'gia_goc'=>80000, 'gia_ban'=> 90000, 'giam_gia'=> 20, 'mo_ta'=> 'Hàng chất lượng cao vãi mịn', 'trang_thai'=>true],
            ['id'=> 18, 'ten_san_pham'=>'Giày stan smith','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 1, 'mon_the_thaos_id'=> 3,'gia_goc'=>1000000, 'gia_ban'=> 1500000, 'giam_gia'=> 20, 'mo_ta'=> 'Giày chất lượng cao, bền, bảo hành 1 năm', 'trang_thai'=>true],
            ['id'=> 19, 'ten_san_pham'=>'Quần giả váy','nha_san_xuats_id'=> 5, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 5,'gia_goc'=>200000, 'gia_ban'=> 250000, 'giam_gia'=> null, 'mo_ta'=> 'Hàng chất lượng cao vãi mịn', 'trang_thai'=>true],
            ['id'=> 20, 'ten_san_pham'=>'Mũ bóng chày','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 3, 'mon_the_thaos_id'=> 4,'gia_goc'=>50000, 'gia_ban'=> 80000, 'giam_gia'=> 10, 'mo_ta'=> 'Mũ đẹp', 'trang_thai'=>true],
            
        ]);
    }
}

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
            ['id'=> 1, 'ten_san_pham'=>'Áo thun','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 9,'gia_goc'=>1000000, 'gia_ban'=> 1200000, 'giam_gia'=> null, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 2, 'ten_san_pham'=>'Áo hoodie','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 9,'gia_goc'=>2000000, 'gia_ban'=> 2500000, 'giam_gia'=> 10, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 3, 'ten_san_pham'=>'Băng đô','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 3, 'mon_the_thaos_id'=> 3,'gia_goc'=>4000000, 'gia_ban'=> 5000000, 'giam_gia'=> null, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 4, 'ten_san_pham'=>'Quần bó','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 9,'gia_goc'=>1000000, 'gia_ban'=> 1500000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 5, 'ten_san_pham'=>'Tất','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 3, 'mon_the_thaos_id'=> 1,'gia_goc'=>1000000, 'gia_ban'=> 1500000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 6, 'ten_san_pham'=>'Quần PSG','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 1,'gia_goc'=>2000000, 'gia_ban'=> 3000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 7, 'ten_san_pham'=>'Gìay bóng đá','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 1, 'mon_the_thaos_id'=> 1,'gia_goc'=>6000000, 'gia_ban'=> 7000000, 'giam_gia'=> null, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 8, 'ten_san_pham'=>'Áo ars','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 1,'gia_goc'=>8000000, 'gia_ban'=> 9000000, 'giam_gia'=> null, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 9, 'ten_san_pham'=>'Áo polo','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 6,'gia_goc'=>7000000, 'gia_ban'=> 10000000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 10, 'ten_san_pham'=>'Cặp','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 3, 'mon_the_thaos_id'=> 1,'gia_goc'=>1000000, 'gia_ban'=> 1500000, 'giam_gia'=> 20, 'mo_ta'=> 'rất đẹp luôn', 'trang_thai'=>true],
            ['id'=> 11, 'ten_san_pham'=>'Áo Nike trắng bóng','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 3,'gia_goc'=>1200000, 'gia_ban'=> 2000000, 'giam_gia'=> 20, 'mo_ta'=> 'Hàng chất lượng cao vãi mịn', 'trang_thai'=>true],
            ['id'=> 12, 'ten_san_pham'=>'Áo Nĩ','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 6,'gia_goc'=>1000000, 'gia_ban'=> 1200000, 'giam_gia'=> null, 'mo_ta'=> 'Hàng chất lượng cao vãi mịn', 'trang_thai'=>true],
            ['id'=> 13, 'ten_san_pham'=>'Bóng ARS','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 3, 'mon_the_thaos_id'=> 1,'gia_goc'=>4000000, 'gia_ban'=> 4500000, 'giam_gia'=> 10, 'mo_ta'=> 'Bóng chất lượng cao', 'trang_thai'=>true],
            ['id'=> 14, 'ten_san_pham'=>'Quần Jordan','nha_san_xuats_id'=> 1, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 9,'gia_goc'=>200000, 'gia_ban'=> 230000, 'giam_gia'=> null, 'mo_ta'=> 'Hàng chất lượng cao vãi mịn', 'trang_thai'=>true],
            ['id'=> 15, 'ten_san_pham'=>'Tất chạy bộ','nha_san_xuats_id'=> 3, 'loai_san_phams_id'=> 3, 'mon_the_thaos_id'=> 9,'gia_goc'=>20000, 'gia_ban'=> 25000, 'giam_gia'=> null, 'mo_ta'=> 'Hàng chất lượng cao vãi mịn', 'trang_thai'=>true],
            ['id'=> 16, 'ten_san_pham'=>'Giày Ultra','nha_san_xuats_id'=> 6, 'loai_san_phams_id'=> 1, 'mon_the_thaos_id'=> 6,'gia_goc'=>1000000, 'gia_ban'=> 1500000, 'giam_gia'=> 15, 'mo_ta'=> 'Giày chất lượng cao, bền, bảo hành 1 năm', 'trang_thai'=>true],
            ['id'=> 17, 'ten_san_pham'=>'Quần sort Adidas','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 3,'gia_goc'=>100000, 'gia_ban'=> 200000, 'giam_gia'=> 20, 'mo_ta'=> 'Hàng chất lượng cao vãi mịn', 'trang_thai'=>true],
            ['id'=> 18, 'ten_san_pham'=>'Giày stan smith','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 1, 'mon_the_thaos_id'=> 3,'gia_goc'=>1000000, 'gia_ban'=> 1500000, 'giam_gia'=> 20, 'mo_ta'=> 'Giày chất lượng cao, bền, bảo hành 1 năm', 'trang_thai'=>true],
            ['id'=> 19, 'ten_san_pham'=>'Quần giả váy','nha_san_xuats_id'=> 5, 'loai_san_phams_id'=> 2, 'mon_the_thaos_id'=> 5,'gia_goc'=>200000, 'gia_ban'=> 250000, 'giam_gia'=> null, 'mo_ta'=> 'Hàng chất lượng cao vãi mịn', 'trang_thai'=>true],
            ['id'=> 20, 'ten_san_pham'=>'Mũ bóng chày','nha_san_xuats_id'=> 2, 'loai_san_phams_id'=> 3, 'mon_the_thaos_id'=> 4,'gia_goc'=>100000, 'gia_ban'=> 120000, 'giam_gia'=> 10, 'mo_ta'=> 'Mũ đẹp', 'trang_thai'=>true],
            
        ]);
    }
}

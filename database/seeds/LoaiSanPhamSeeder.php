<?php

use Illuminate\Database\Seeder;

class LoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('loai_san_phams')->insert([
            ['id'=> 1, 'ten_loai_san_pham'=>'giày', 'trang_thai'=>true],
            ['id'=> 2, 'ten_loai_san_pham'=>'dép', 'trang_thai'=>true],
            ['id'=> 3, 'ten_loai_san_pham'=>'bóng', 'trang_thai'=>true],
            ['id'=> 4, 'ten_loai_san_pham'=>'quần', 'trang_thai'=>true],
            ['id'=> 5, 'ten_loai_san_pham'=>'áo', 'trang_thai'=>true],
            ['id'=> 6, 'ten_loai_san_pham'=>'túi', 'trang_thai'=>true],
            ['id'=> 7, 'ten_loai_san_pham'=>'kính', 'trang_thai'=>true],
            ['id'=> 8, 'ten_loai_san_pham'=>'vợt', 'trang_thai'=>true],
            ['id'=> 9, 'ten_loai_san_pham'=>'tất', 'trang_thai'=>true],
            ['id'=> 10, 'ten_loai_san_pham'=>'băng giảm đau', 'trang_thai'=>true],
        ]);
    }
}

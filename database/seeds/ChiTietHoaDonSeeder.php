<?php

use Illuminate\Database\Seeder;

class ChiTietHoaDonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('chi_tiet_hoa_dons')->insert([
            ['id'=> 1, 'chi_tiet_san_phams_id'=> 1, 'hoa_dons_id'=>1, 'so_luong'=>50],
            ['id'=> 2, 'chi_tiet_san_phams_id'=> 1, 'hoa_dons_id'=>1, 'so_luong'=>100],
            ['id'=> 3, 'chi_tiet_san_phams_id'=> 2, 'hoa_dons_id'=>1, 'so_luong'=>50],
            ['id'=> 4, 'chi_tiet_san_phams_id'=> 2, 'hoa_dons_id'=>1, 'so_luong'=>60],
            ['id'=> 5, 'chi_tiet_san_phams_id'=> 3, 'hoa_dons_id'=>1, 'so_luong'=>50],
            ['id'=> 6, 'chi_tiet_san_phams_id'=> 3, 'hoa_dons_id'=>2, 'so_luong'=>80],
            ['id'=> 7, 'chi_tiet_san_phams_id'=> 3, 'hoa_dons_id'=>2, 'so_luong'=>50],
            ['id'=> 8, 'chi_tiet_san_phams_id'=> 3, 'hoa_dons_id'=>2, 'so_luong'=>50],
            ['id'=> 9, 'chi_tiet_san_phams_id'=> 3, 'hoa_dons_id'=>2, 'so_luong'=>60],
            ['id'=> 10, 'chi_tiet_san_phams_id'=> 3, 'hoa_dons_id'=>2, 'so_luong'=>50],
            ['id'=> 11, 'chi_tiet_san_phams_id'=> 4, 'hoa_dons_id'=>2, 'so_luong'=>20],
            ['id'=> 12, 'chi_tiet_san_phams_id'=> 4, 'hoa_dons_id'=>2, 'so_luong'=>50],
            ['id'=> 13, 'chi_tiet_san_phams_id'=> 5, 'hoa_dons_id'=>1, 'so_luong'=>30],
            ['id'=> 14, 'chi_tiet_san_phams_id'=> 5, 'hoa_dons_id'=>3, 'so_luong'=>50],
            ['id'=> 15, 'chi_tiet_san_phams_id'=> 6, 'hoa_dons_id'=>3, 'so_luong'=>50],
            ['id'=> 16, 'chi_tiet_san_phams_id'=> 6, 'hoa_dons_id'=>3, 'so_luong'=>50],
            ['id'=> 17, 'chi_tiet_san_phams_id'=> 7, 'hoa_dons_id'=>3, 'so_luong'=>200],
            ['id'=> 18, 'chi_tiet_san_phams_id'=> 7, 'hoa_dons_id'=>3, 'so_luong'=>400],
            ['id'=> 19, 'chi_tiet_san_phams_id'=> 8, 'hoa_dons_id'=>1, 'so_luong'=>100],
            ['id'=> 20, 'chi_tiet_san_phams_id'=> 8, 'hoa_dons_id'=>1, 'so_luong'=>30],
            ['id'=> 21, 'chi_tiet_san_phams_id'=> 9, 'hoa_dons_id'=>1, 'so_luong'=>60],
            ['id'=> 22, 'chi_tiet_san_phams_id'=> 9, 'hoa_dons_id'=>1, 'so_luong'=>20],
            ['id'=> 23, 'chi_tiet_san_phams_id'=> 10, 'hoa_dons_id'=>1, 'so_luong'=>40],
            ['id'=> 24, 'chi_tiet_san_phams_id'=> 10, 'hoa_dons_id'=>1, 'so_luong'=>50],
        ]);
    }

}

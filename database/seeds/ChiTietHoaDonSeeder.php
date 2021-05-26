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
            ['id'=> 6, 'chi_tiet_san_phams_id'=> 3, 'hoa_dons_id'=>1, 'so_luong'=>80],
            ['id'=> 7, 'chi_tiet_san_phams_id'=> 3, 'hoa_dons_id'=>1, 'so_luong'=>50],
            ['id'=> 8, 'chi_tiet_san_phams_id'=> 3, 'hoa_dons_id'=>1, 'so_luong'=>50],
            ['id'=> 9, 'chi_tiet_san_phams_id'=> 3, 'hoa_dons_id'=>1, 'so_luong'=>60],
            ['id'=> 10, 'chi_tiet_san_phams_id'=> 3, 'hoa_dons_id'=>1, 'so_luong'=>50],
        ]);
    }

}

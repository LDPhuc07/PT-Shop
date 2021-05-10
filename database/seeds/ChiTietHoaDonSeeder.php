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
        //
        DB::table('chi_tiet_hoa_dons')->insert([
            ['id'=> 1, 'san_phams_id'=> 1, 'hoa_dons_id'=>1, 'so_luong'=>50],
            ['id'=> 2, 'san_phams_id'=> 1, 'hoa_dons_id'=>1, 'so_luong'=>50],
            ['id'=> 3, 'san_phams_id'=> 1, 'hoa_dons_id'=>1, 'so_luong'=>50],
            ['id'=> 4, 'san_phams_id'=> 1, 'hoa_dons_id'=>1, 'so_luong'=>50],
            ['id'=> 5, 'san_phams_id'=> 1, 'hoa_dons_id'=>1, 'so_luong'=>50],
            ['id'=> 6, 'san_phams_id'=> 3, 'hoa_dons_id'=>1, 'so_luong'=>50],
            ['id'=> 7, 'san_phams_id'=> 3, 'hoa_dons_id'=>1, 'so_luong'=>50],
            ['id'=> 8, 'san_phams_id'=> 3, 'hoa_dons_id'=>1, 'so_luong'=>50],
            ['id'=> 9, 'san_phams_id'=> 3, 'hoa_dons_id'=>1, 'so_luong'=>50],
            ['id'=> 10, 'san_phams_id'=> 3, 'hoa_dons_id'=>1, 'so_luong'=>50],
        ]);
    }

}

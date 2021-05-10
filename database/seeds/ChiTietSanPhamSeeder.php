<?php

use Illuminate\Database\Seeder;

class ChiTietSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //
         DB::table('chi_tiet_san_phams')->insert([
            ['id'=> 1, 'san_phams_id'=> 1,'mau'=>'xanh', 'kich_thuoc'=>'x', 'so_luong'=>10],
            ['id'=> 2, 'san_phams_id'=> 1,'mau'=>'xanh', 'kich_thuoc'=>'x', 'so_luong'=>10],
            ['id'=> 3, 'san_phams_id'=> 2,'mau'=>'xanh', 'kich_thuoc'=>'x', 'so_luong'=>10],
            ['id'=> 4, 'san_phams_id'=> 2,'mau'=>'xanh', 'kich_thuoc'=>'x', 'so_luong'=>10],
            ['id'=> 5, 'san_phams_id'=> 3,'mau'=>'xanh', 'kich_thuoc'=>'x', 'so_luong'=>10],
            ['id'=> 6, 'san_phams_id'=> 3,'mau'=>'xanh', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            ['id'=> 7, 'san_phams_id'=> 4,'mau'=>'xanh', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            ['id'=> 8, 'san_phams_id'=> 4,'mau'=>'xanh', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            ['id'=> 9, 'san_phams_id'=> 5,'mau'=>'xanh', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            ['id'=> 10, 'san_phams_id'=> 5,'mau'=>'xanh', 'kich_thuoc'=>'xl', 'so_luong'=>10],
        ]);
    }
}

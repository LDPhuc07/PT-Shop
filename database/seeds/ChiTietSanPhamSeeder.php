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
            ['id'=> 1, 'san_phams_id'=> 1,'mau'=>'trăng', 'kich_thuoc'=>'x', 'so_luong'=>10],
            ['id'=> 2, 'san_phams_id'=> 1,'mau'=>'xanh dương', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            ['id'=> 3, 'san_phams_id'=> 2,'mau'=>'cam', 'kich_thuoc'=>'x', 'so_luong'=>10],
            ['id'=> 4, 'san_phams_id'=> 2,'mau'=>'do', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            ['id'=> 5, 'san_phams_id'=> 3,'mau'=>'trang', 'kich_thuoc'=>'to', 'so_luong'=>10],
            ['id'=> 6, 'san_phams_id'=> 3,'mau'=>'den', 'kich_thuoc'=>'vừa', 'so_luong'=>10],
            ['id'=> 7, 'san_phams_id'=> 4,'mau'=>'trang', 'kich_thuoc'=>'x', 'so_luong'=>10],
            ['id'=> 8, 'san_phams_id'=> 4,'mau'=>'xanh duong', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            ['id'=> 9, 'san_phams_id'=> 5,'mau'=>'den', 'kich_thuoc'=>'vua', 'so_luong'=>10],
            ['id'=> 10, 'san_phams_id'=> 9,'mau'=>'xanh duong', 'kich_thuoc'=>'x', 'so_luong'=>10],
            ['id'=> 12, 'san_phams_id'=> 9,'mau'=>'trang', 'kich_thuoc'=>'xl', 'so_luong'=>5],
            ['id'=> 13, 'san_phams_id'=> 6,'mau'=>'xanh duong', 'kich_thuoc'=>'x', 'so_luong'=>10],
            ['id'=> 14, 'san_phams_id'=> 7,'mau'=>'trang', 'kich_thuoc'=>'37', 'so_luong'=>5],
            ['id'=> 15, 'san_phams_id'=> 7,'mau'=>'xanh duong', 'kich_thuoc'=>'38', 'so_luong'=>10],
            ['id'=> 16, 'san_phams_id'=> 7,'mau'=>'xanh la', 'kich_thuoc'=>'39', 'so_luong'=>5],
            ['id'=> 17, 'san_phams_id'=> 7,'mau'=>'trang', 'kich_thuoc'=>'40', 'so_luong'=>5],
            ['id'=> 18, 'san_phams_id'=> 8,'mau'=>'tim', 'kich_thuoc'=>'x', 'so_luong'=>5],
            ['id'=> 19, 'san_phams_id'=> 8,'mau'=>'vang', 'kich_thuoc'=>'xl', 'so_luong'=>5],
            ['id'=> 20, 'san_phams_id'=> 10,'mau'=>'den', 'kich_thuoc'=>'to', 'so_luong'=>5],
            ['id'=> 21, 'san_phams_id'=> 10,'mau'=>'trang', 'kich_thuoc'=>'vua', 'so_luong'=>5],
            ['id'=> 22, 'san_phams_id'=> 5,'mau'=>'trang', 'kich_thuoc'=>'to', 'so_luong'=>10],
            ['id'=> 23, 'san_phams_id'=> 6,'mau'=>'den', 'kich_thuoc'=>'xl', 'so_luong'=>10],
    
        ]);
    }
}

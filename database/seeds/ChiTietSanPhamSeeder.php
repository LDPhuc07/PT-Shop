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
            ['id'=> 1, 'san_phams_id'=> 1,'mau'=>'trang', 'kich_thuoc'=>'x', 'so_luong'=>10],
            ['id'=> 2, 'san_phams_id'=> 1,'mau'=>'xanh duong', 'kich_thuoc'=>'xl', 'so_luong'=>10],
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
            ['id'=> 17, 'san_phams_id'=> 7,'mau'=>'xanh duong', 'kich_thuoc'=>'40', 'so_luong'=>5],
            ['id'=> 18, 'san_phams_id'=> 8,'mau'=>'tim', 'kich_thuoc'=>'x', 'so_luong'=>5],
            ['id'=> 19, 'san_phams_id'=> 8,'mau'=>'vang', 'kich_thuoc'=>'xl', 'so_luong'=>5],
            ['id'=> 20, 'san_phams_id'=> 10,'mau'=>'den', 'kich_thuoc'=>'to', 'so_luong'=>5],
            ['id'=> 21, 'san_phams_id'=> 10,'mau'=>'trang', 'kich_thuoc'=>'vua', 'so_luong'=>5],
            ['id'=> 22, 'san_phams_id'=> 5,'mau'=>'trang', 'kich_thuoc'=>'to', 'so_luong'=>10],
            ['id'=> 23, 'san_phams_id'=> 6,'mau'=>'den', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            
            ['id'=> 24, 'san_phams_id'=> 11,'mau'=>'trang', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            ['id'=> 25, 'san_phams_id'=> 11,'mau'=>'den', 'kich_thuoc'=>'xl', 'so_luong'=>20],
            ['id'=> 26, 'san_phams_id'=> 11,'mau'=>'den', 'kich_thuoc'=>'l', 'so_luong'=>20],

            ['id'=> 27, 'san_phams_id'=> 12,'mau'=>'vang', 'kich_thuoc'=>'x', 'so_luong'=>10],
            ['id'=> 28, 'san_phams_id'=> 12,'mau'=>'xanh duong', 'kich_thuoc'=>'x', 'so_luong'=>20],
            ['id'=> 29, 'san_phams_id'=> 12,'mau'=>'do', 'kich_thuoc'=>'l', 'so_luong'=>20],
            ['id'=> 30, 'san_phams_id'=> 12,'mau'=>'do', 'kich_thuoc'=>'xl', 'so_luong'=>20],

            ['id'=> 31, 'san_phams_id'=> 13,'mau'=>'do', 'kich_thuoc'=>'to', 'so_luong'=>20],
            ['id'=> 32, 'san_phams_id'=> 13,'mau'=>'do', 'kich_thuoc'=>'nho', 'so_luong'=>20],

            ['id'=> 33, 'san_phams_id'=> 14,'mau'=>'nau', 'kich_thuoc'=>'xl', 'so_luong'=>20],
            ['id'=> 34, 'san_phams_id'=> 14,'mau'=>'xanh duong', 'kich_thuoc'=>'xl', 'so_luong'=>20],
            ['id'=> 35, 'san_phams_id'=> 14,'mau'=>'nau', 'kich_thuoc'=>'l', 'so_luong'=>10],
            ['id'=> 36, 'san_phams_id'=> 14,'mau'=>'xanh duong', 'kich_thuoc'=>'l', 'so_luong'=>20],

            ['id'=> 37, 'san_phams_id'=> 15,'mau'=>'trang', 'kich_thuoc'=>'s', 'so_luong'=>20],
            ['id'=> 38, 'san_phams_id'=> 15,'mau'=>'xanh', 'kich_thuoc'=>'m', 'so_luong'=>20],
            ['id'=> 39, 'san_phams_id'=> 15,'mau'=>'hong', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            ['id'=> 40, 'san_phams_id'=> 15,'mau'=>'den', 'kich_thuoc'=>'x', 'so_luong'=>20],
            ['id'=> 41, 'san_phams_id'=> 15,'mau'=>'hong', 'kich_thuoc'=>'s', 'so_luong'=>10],
            ['id'=> 42, 'san_phams_id'=> 15,'mau'=>'den', 'kich_thuoc'=>'m', 'so_luong'=>20],

            ['id'=> 43, 'san_phams_id'=> 16,'mau'=>'den', 'kich_thuoc'=>'39', 'so_luong'=>20],
            ['id'=> 44, 'san_phams_id'=> 16,'mau'=>'den', 'kich_thuoc'=>'40', 'so_luong'=>20],
            ['id'=> 45, 'san_phams_id'=> 16,'mau'=>'den', 'kich_thuoc'=>'41', 'so_luong'=>10],
            ['id'=> 46, 'san_phams_id'=> 16,'mau'=>'den', 'kich_thuoc'=>'42', 'so_luong'=>20],

            ['id'=> 47, 'san_phams_id'=> 17,'mau'=>'trang', 'kich_thuoc'=>'xl', 'so_luong'=>30],
            ['id'=> 48, 'san_phams_id'=> 17,'mau'=>'trang', 'kich_thuoc'=>'l', 'so_luong'=>20],
            ['id'=> 49, 'san_phams_id'=> 17,'mau'=>'trang', 'kich_thuoc'=>'x', 'so_luong'=>10],

            ['id'=> 50, 'san_phams_id'=> 18,'mau'=>'trang', 'kich_thuoc'=>'39', 'so_luong'=>20],
            ['id'=> 51, 'san_phams_id'=> 18,'mau'=>'xanh', 'kich_thuoc'=>'40', 'so_luong'=>20],
            ['id'=> 52, 'san_phams_id'=> 18,'mau'=>'do', 'kich_thuoc'=>'41', 'so_luong'=>10],
            ['id'=> 53, 'san_phams_id'=> 18,'mau'=>'trang', 'kich_thuoc'=>'40', 'so_luong'=>20],
            ['id'=> 54, 'san_phams_id'=> 18,'mau'=>'xanh', 'kich_thuoc'=>'39', 'so_luong'=>20],
            ['id'=> 55, 'san_phams_id'=> 18,'mau'=>'trang', 'kich_thuoc'=>'41', 'so_luong'=>20],

            ['id'=> 56, 'san_phams_id'=> 19,'mau'=>'trang', 'kich_thuoc'=>'xl', 'so_luong'=>30],
            ['id'=> 57, 'san_phams_id'=> 19,'mau'=>'trang', 'kich_thuoc'=>'l', 'so_luong'=>20],
            ['id'=> 58, 'san_phams_id'=> 19,'mau'=>'trang', 'kich_thuoc'=>'x', 'so_luong'=>10],

            ['id'=> 59, 'san_phams_id'=> 20,'mau'=>'trang', 'kich_thuoc'=>'to', 'so_luong'=>30],
            ['id'=> 60, 'san_phams_id'=> 20,'mau'=>'trang', 'kich_thuoc'=>'nho', 'so_luong'=>20],

        ]);
    }
}

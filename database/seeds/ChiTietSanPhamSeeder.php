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
            ['id'=> 1, 'san_phams_id'=> 1,'mau'=>'trắng', 'kich_thuoc'=>'s', 'so_luong'=>10],
            ['id'=> 2, 'san_phams_id'=> 1,'mau'=>'xanh dương', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            ['id'=> 3, 'san_phams_id'=> 2,'mau'=>'cam', 'kich_thuoc'=>'s', 'so_luong'=>10],
            ['id'=> 4, 'san_phams_id'=> 2,'mau'=>'đỏ', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            ['id'=> 5, 'san_phams_id'=> 3,'mau'=>'trắng', 'kich_thuoc'=>'to', 'so_luong'=>10],
            ['id'=> 6, 'san_phams_id'=> 3,'mau'=>'đen', 'kich_thuoc'=>'nhỏ', 'so_luong'=>10],
            ['id'=> 7, 'san_phams_id'=> 4,'mau'=>'trắng', 'kich_thuoc'=>'s', 'so_luong'=>10],
            ['id'=> 8, 'san_phams_id'=> 4,'mau'=>'xanh dương', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            ['id'=> 9, 'san_phams_id'=> 5,'mau'=>'đen', 'kich_thuoc'=>'m', 'so_luong'=>10],
            ['id'=> 10, 'san_phams_id'=> 9,'mau'=>'xanh dương', 'kich_thuoc'=>'s', 'so_luong'=>10],
            ['id'=> 12, 'san_phams_id'=> 9,'mau'=>'trắng', 'kich_thuoc'=>'xl', 'so_luong'=>5],
            ['id'=> 13, 'san_phams_id'=> 6,'mau'=>'xanh dương', 'kich_thuoc'=>'s', 'so_luong'=>10],
            ['id'=> 14, 'san_phams_id'=> 7,'mau'=>'trắng', 'kich_thuoc'=>'37', 'so_luong'=>5],
            ['id'=> 15, 'san_phams_id'=> 7,'mau'=>'xanh dương', 'kich_thuoc'=>'38', 'so_luong'=>10],
            ['id'=> 16, 'san_phams_id'=> 7,'mau'=>'xanh lá', 'kich_thuoc'=>'39', 'so_luong'=>5],
            ['id'=> 17, 'san_phams_id'=> 7,'mau'=>'xanh dương', 'kich_thuoc'=>'40', 'so_luong'=>5],
            ['id'=> 18, 'san_phams_id'=> 8,'mau'=>'tím', 'kich_thuoc'=>'s', 'so_luong'=>5],
            ['id'=> 19, 'san_phams_id'=> 8,'mau'=>'vàng', 'kich_thuoc'=>'xl', 'so_luong'=>5],
            ['id'=> 20, 'san_phams_id'=> 10,'mau'=>'đen', 'kich_thuoc'=>'40x30', 'so_luong'=>5],
            ['id'=> 21, 'san_phams_id'=> 10,'mau'=>'trắng', 'kich_thuoc'=>'40x25', 'so_luong'=>5],
            ['id'=> 22, 'san_phams_id'=> 5,'mau'=>'trắng', 'kich_thuoc'=>'to', 'so_luong'=>10],
            ['id'=> 23, 'san_phams_id'=> 6,'mau'=>'đen', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            
            ['id'=> 24, 'san_phams_id'=> 11,'mau'=>'trắng', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            ['id'=> 25, 'san_phams_id'=> 11,'mau'=>'đen', 'kich_thuoc'=>'xl', 'so_luong'=>20],
            ['id'=> 26, 'san_phams_id'=> 11,'mau'=>'đen', 'kich_thuoc'=>'l', 'so_luong'=>20],

            ['id'=> 27, 'san_phams_id'=> 12,'mau'=>'vàng', 'kich_thuoc'=>'s', 'so_luong'=>10],
            ['id'=> 28, 'san_phams_id'=> 12,'mau'=>'xanh dương', 'kich_thuoc'=>'s', 'so_luong'=>20],
            ['id'=> 29, 'san_phams_id'=> 12,'mau'=>'đỏ', 'kich_thuoc'=>'l', 'so_luong'=>20],
            ['id'=> 30, 'san_phams_id'=> 12,'mau'=>'đỏ', 'kich_thuoc'=>'xl', 'so_luong'=>20],

            ['id'=> 31, 'san_phams_id'=> 13,'mau'=>'đỏ', 'kich_thuoc'=>'1', 'so_luong'=>20],
            ['id'=> 32, 'san_phams_id'=> 13,'mau'=>'đỏ', 'kich_thuoc'=>'2', 'so_luong'=>20],

            ['id'=> 33, 'san_phams_id'=> 14,'mau'=>'nâu', 'kich_thuoc'=>'xl', 'so_luong'=>20],
            ['id'=> 34, 'san_phams_id'=> 14,'mau'=>'xanh dương', 'kich_thuoc'=>'xl', 'so_luong'=>20],
            ['id'=> 35, 'san_phams_id'=> 14,'mau'=>'nâu', 'kich_thuoc'=>'l', 'so_luong'=>10],
            ['id'=> 36, 'san_phams_id'=> 14,'mau'=>'xanh dương', 'kich_thuoc'=>'l', 'so_luong'=>20],

            ['id'=> 37, 'san_phams_id'=> 15,'mau'=>'trắng', 'kich_thuoc'=>'s', 'so_luong'=>20],
            ['id'=> 38, 'san_phams_id'=> 15,'mau'=>'xanh', 'kich_thuoc'=>'m', 'so_luong'=>20],
            ['id'=> 39, 'san_phams_id'=> 15,'mau'=>'hồng', 'kich_thuoc'=>'xl', 'so_luong'=>10],
            ['id'=> 40, 'san_phams_id'=> 15,'mau'=>'đen', 'kich_thuoc'=>'s', 'so_luong'=>20],
            ['id'=> 41, 'san_phams_id'=> 15,'mau'=>'hồng', 'kich_thuoc'=>'s', 'so_luong'=>10],
            ['id'=> 42, 'san_phams_id'=> 15,'mau'=>'đen', 'kich_thuoc'=>'m', 'so_luong'=>20],

            ['id'=> 43, 'san_phams_id'=> 16,'mau'=>'đen', 'kich_thuoc'=>'39', 'so_luong'=>20],
            ['id'=> 44, 'san_phams_id'=> 16,'mau'=>'đen', 'kich_thuoc'=>'40', 'so_luong'=>20],
            ['id'=> 45, 'san_phams_id'=> 16,'mau'=>'đen', 'kich_thuoc'=>'41', 'so_luong'=>10],
            ['id'=> 46, 'san_phams_id'=> 16,'mau'=>'đen', 'kich_thuoc'=>'42', 'so_luong'=>20],

            ['id'=> 47, 'san_phams_id'=> 17,'mau'=>'trắng', 'kich_thuoc'=>'xl', 'so_luong'=>30],
            ['id'=> 48, 'san_phams_id'=> 17,'mau'=>'trắng', 'kich_thuoc'=>'l', 'so_luong'=>20],
            ['id'=> 49, 'san_phams_id'=> 17,'mau'=>'trắng', 'kich_thuoc'=>'s', 'so_luong'=>10],

            ['id'=> 50, 'san_phams_id'=> 18,'mau'=>'trắng', 'kich_thuoc'=>'39', 'so_luong'=>20],
            ['id'=> 51, 'san_phams_id'=> 18,'mau'=>'xanh', 'kich_thuoc'=>'40', 'so_luong'=>20],
            ['id'=> 52, 'san_phams_id'=> 18,'mau'=>'đỏ', 'kich_thuoc'=>'41', 'so_luong'=>10],
            ['id'=> 53, 'san_phams_id'=> 18,'mau'=>'trắng', 'kich_thuoc'=>'40', 'so_luong'=>20],
            ['id'=> 54, 'san_phams_id'=> 18,'mau'=>'xanh', 'kich_thuoc'=>'39', 'so_luong'=>20],
            ['id'=> 55, 'san_phams_id'=> 18,'mau'=>'trắng', 'kich_thuoc'=>'41', 'so_luong'=>20],

            ['id'=> 56, 'san_phams_id'=> 19,'mau'=>'trắng', 'kich_thuoc'=>'xl', 'so_luong'=>30],
            ['id'=> 57, 'san_phams_id'=> 19,'mau'=>'trắng', 'kich_thuoc'=>'l', 'so_luong'=>20],
            ['id'=> 58, 'san_phams_id'=> 19,'mau'=>'trắng', 'kich_thuoc'=>'s', 'so_luong'=>10],

            ['id'=> 59, 'san_phams_id'=> 20,'mau'=>'trắng', 'kich_thuoc'=>'m', 'so_luong'=>30],
            ['id'=> 60, 'san_phams_id'=> 20,'mau'=>'trắng', 'kich_thuoc'=>'l', 'so_luong'=>20],

        ]);
    }
}

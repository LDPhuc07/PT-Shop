<?php

use Illuminate\Database\Seeder;

class AnhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('anhs')->insert([
            ['id'=> 1, 'san_phams_id'=> 7,'anhchinh'=>true,'anhchitiet'=>'nikejrmercurial1.jpg','link'=>'/img/product/nikejrmercurial1.jpg', 'trang_thai'=>true],
            ['id'=> 2, 'san_phams_id'=> 7,'anhchinh'=>false,'anhchitiet'=>'nikejrmercurial2.png','link'=>'/img/product/nikejrmercurial2.png', 'trang_thai'=>true],
            ['id'=> 3, 'san_phams_id'=> 7,'anhchinh'=>false,'anhchitiet'=>'nikejrmercurial3.png','link'=>'/img/product/nikejrmercurial3.png', 'trang_thai'=>true],
            ['id'=> 4, 'san_phams_id'=> 7,'anhchinh'=>false,'anhchitiet'=>'nikejrmercurial4.png','link'=>'/img/product/nikejrmercurial4.png', 'trang_thai'=>true],
            ['id'=> 5, 'san_phams_id'=> 8,'anhchinh'=>true,'anhchitiet'=>'ars1.jpg','link'=>'/img/product/ars1.jpg', 'trang_thai'=>true],
            ['id'=> 6, 'san_phams_id'=> 8,'anhchinh'=>false,'anhchitiet'=>'ars2.jpg','link'=>'/img/product/ars2.jpg', 'trang_thai'=>true],
            ['id'=> 7, 'san_phams_id'=> 8,'anhchinh'=>false,'anhchitiet'=>'ars3.jpg','link'=>'/img/product/ars3.jpg', 'trang_thai'=>true],
            ['id'=> 8, 'san_phams_id'=> 8,'anhchinh'=>false,'anhchitiet'=>'ars4.jpg','link'=>'/img/product/ars4.jpg', 'trang_thai'=>true],
            ['id'=> 9, 'san_phams_id'=> 9,'anhchinh'=>true,'anhchitiet'=>'aopolo1.jpg','link'=>'/img/product/aopolo1.jpg', 'trang_thai'=>true],
            ['id'=> 10, 'san_phams_id'=> 9,'anhchinh'=>false,'anhchitiet'=>'aopolo2.jpg','link'=>'/img/product/aopolo2.jpg', 'trang_thai'=>true],
            ['id'=> 11, 'san_phams_id'=> 9,'anhchinh'=>false,'anhchitiet'=>'aopolo3.jpg','link'=>'/img/product/aopolo3.jpg', 'trang_thai'=>true],
            ['id'=> 12, 'san_phams_id'=> 9,'anhchinh'=>false,'anhchitiet'=>'aopolo4.jpg','link'=>'/img/product/aopolo4.jpg', 'trang_thai'=>true],
            ['id'=> 13, 'san_phams_id'=> 10,'anhchinh'=>true,'anhchitiet'=>'nikebrasilia1.jpg','link'=>'/img/product/nikebrasilia1.jpg', 'trang_thai'=>true],
            ['id'=> 14, 'san_phams_id'=> 10,'anhchinh'=>false,'anhchitiet'=>'nikebrasilia2.png','link'=>'/img/product/nikebrasilia2.png', 'trang_thai'=>true],
            ['id'=> 15, 'san_phams_id'=> 10,'anhchinh'=>false,'anhchitiet'=>'nikebrasilia3.png','link'=>'/img/product/nikebrasilia3.png', 'trang_thai'=>true],
            ['id'=> 16, 'san_phams_id'=> 10,'anhchinh'=>false,'anhchitiet'=>'nikebrasilia4.png','link'=>'/img/product/nikebrasilia4.png', 'trang_thai'=>true],
            
            ['id'=> 17, 'san_phams_id'=> 6,'anhchinh'=>true,'anhchitiet'=>'psg1.jpg','link'=>'/img/product/psg1.jpg', 'trang_thai'=>true],
            ['id'=> 18, 'san_phams_id'=> 6,'anhchinh'=>false,'anhchitiet'=>'psg2.png','link'=>'/img/product/psg2.png', 'trang_thai'=>true],
            ['id'=> 19, 'san_phams_id'=> 6,'anhchinh'=>false,'anhchitiet'=>'psg3.png','link'=>'/img/product/psg3.png', 'trang_thai'=>true],
            ['id'=> 20, 'san_phams_id'=> 6,'anhchinh'=>false,'anhchitiet'=>'psg4.png','link'=>'/img/product/psg4.png', 'trang_thai'=>true],
            
            ['id'=> 21, 'san_phams_id'=> 1,'anhchinh'=>true,'anhchitiet'=>'adirunner.jpg','link'=>'/img/product/adirunner.jpg', 'trang_thai'=>true],
            ['id'=> 22, 'san_phams_id'=> 1,'anhchinh'=>false,'anhchitiet'=>'adirunner2.jpg','link'=>'/img/product/adirunner2.jpg', 'trang_thai'=>true],
            ['id'=> 23, 'san_phams_id'=> 1,'anhchinh'=>false,'anhchitiet'=>'adirunner3.jpg','link'=>'/img/product/adirunner3.jpg', 'trang_thai'=>true],
            ['id'=> 24, 'san_phams_id'=> 1,'anhchinh'=>false,'anhchitiet'=>'adirunner4.jpg','link'=>'/img/product/adirunner4.jpg', 'trang_thai'=>true],
            ['id'=> 25, 'san_phams_id'=> 2,'anhchinh'=>true,'anhchitiet'=>'aohoodie1.jpg','link'=>'/img/product/aohoodie1.jpg', 'trang_thai'=>true],
            ['id'=> 26, 'san_phams_id'=> 2,'anhchinh'=>false,'anhchitiet'=>'aohoodie2.jpg','link'=>'/img/product/aohoodie2.jpg', 'trang_thai'=>true],
            ['id'=> 27, 'san_phams_id'=> 2,'anhchinh'=>false,'anhchitiet'=>'aohoodie3.jpg','link'=>'/img/product/aohoodie3.jpg', 'trang_thai'=>true],
            ['id'=> 28, 'san_phams_id'=> 2,'anhchinh'=>false,'anhchitiet'=>'aohoodie4.jpg','link'=>'/img/product/aohoodie4.jpg', 'trang_thai'=>true],
            ['id'=> 29, 'san_phams_id'=> 3,'anhchinh'=>true,'anhchitiet'=>'bangdo1.jpg','link'=>'/img/product/bangdo1.jpg', 'trang_thai'=>true],
            ['id'=> 30, 'san_phams_id'=> 3,'anhchinh'=>false,'anhchitiet'=>'bangdo2.jpg','link'=>'/img/product/bangdo2.jpg', 'trang_thai'=>true],
            ['id'=> 31, 'san_phams_id'=> 3,'anhchinh'=>false,'anhchitiet'=>'bangdo3.jpg','link'=>'/img/product/bangdo3.jpg', 'trang_thai'=>true],
            ['id'=> 32, 'san_phams_id'=> 3,'anhchinh'=>false,'anhchitiet'=>'bangdo4.jpg','link'=>'/img/product/bangdo4.jpg', 'trang_thai'=>true],
            ['id'=> 33, 'san_phams_id'=> 4,'anhchinh'=>true,'anhchitiet'=>'drifit1.jpg','link'=>'/img/product/drifit1.jpg', 'trang_thai'=>true],
            ['id'=> 34, 'san_phams_id'=> 4,'anhchinh'=>false,'anhchitiet'=>'drifit2.png','link'=>'/img/product/drifit2.png', 'trang_thai'=>true],
            ['id'=> 35, 'san_phams_id'=> 4,'anhchinh'=>false,'anhchitiet'=>'drifit3.png','link'=>'/img/product/drifit3.png', 'trang_thai'=>true],
            ['id'=> 36, 'san_phams_id'=> 4,'anhchinh'=>false,'anhchitiet'=>'drifit4.png','link'=>'/img/product/drifit4.png', 'trang_thai'=>true],
            ['id'=> 37, 'san_phams_id'=> 5,'anhchinh'=>true,'anhchitiet'=>'cushioned1.jpg','link'=>'/img/product/cushioned1.jpg', 'trang_thai'=>true],
            ['id'=> 38, 'san_phams_id'=> 5,'anhchinh'=>false,'anhchitiet'=>'cushioned2.png','link'=>'/img/product/cushioned2.png', 'trang_thai'=>true],
            ['id'=> 39, 'san_phams_id'=> 5,'anhchinh'=>false,'anhchitiet'=>'cushioned3.png','link'=>'/img/product/cushioned3.png', 'trang_thai'=>true],
            ['id'=> 40, 'san_phams_id'=> 5,'anhchinh'=>false,'anhchitiet'=>'cushioned4.png','link'=>'/img/product/cushioned4.png', 'trang_thai'=>true],
            
        ]);
    }
}

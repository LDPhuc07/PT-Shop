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

            ['id'=> 41, 'san_phams_id'=> 11,'anhchinh'=>true,'anhchitiet'=>'ambush1.jpg','link'=>'/img/product/ambush1.jpg', 'trang_thai'=>true],
            ['id'=> 42, 'san_phams_id'=> 11,'anhchinh'=>false,'anhchitiet'=>'ambush2.png','link'=>'/img/product/ambush2.png', 'trang_thai'=>true],
            ['id'=> 43, 'san_phams_id'=> 11,'anhchinh'=>false,'anhchitiet'=>'ambush3.png','link'=>'/img/product/ambush3.png', 'trang_thai'=>true],
            ['id'=> 44, 'san_phams_id'=> 11,'anhchinh'=>false,'anhchitiet'=>'ambush4.png','link'=>'/img/product/ambush4.png', 'trang_thai'=>true],

            ['id'=> 45, 'san_phams_id'=> 12,'anhchinh'=>true,'anhchitiet'=>'aoni1.jpg','link'=>'/img/product/aoni1.jpg', 'trang_thai'=>true],
            ['id'=> 46, 'san_phams_id'=> 12,'anhchinh'=>false,'anhchitiet'=>'aoni2.jpg','link'=>'/img/product/aoni2.jpg', 'trang_thai'=>true],
            

            ['id'=> 47, 'san_phams_id'=> 13,'anhchinh'=>true,'anhchitiet'=>'bongars1.jpg','link'=>'/img/product/bongars1.jpg', 'trang_thai'=>true],
            ['id'=> 48, 'san_phams_id'=> 13,'anhchinh'=>false,'anhchitiet'=>'bongars2.jpg','link'=>'/img/product/bongars2.jpg', 'trang_thai'=>true],
            ['id'=> 49, 'san_phams_id'=> 13,'anhchinh'=>false,'anhchitiet'=>'bongars3.jpg','link'=>'/img/product/bongars3.jpg', 'trang_thai'=>true],
            ['id'=> 50, 'san_phams_id'=> 13,'anhchinh'=>false,'anhchitiet'=>'bongars4.jpg','link'=>'/img/product/bongars4.jpg', 'trang_thai'=>true],

            ['id'=> 51, 'san_phams_id'=> 14,'anhchinh'=>true,'anhchitiet'=>'jordanjumpman1.jpg','link'=>'/img/product/jordanjumpman1.jpg', 'trang_thai'=>true],
            ['id'=> 52, 'san_phams_id'=> 14,'anhchinh'=>false,'anhchitiet'=>'jordanjumpman2.png','link'=>'/img/product/jordanjumpman2.png', 'trang_thai'=>true],
            ['id'=> 53, 'san_phams_id'=> 14,'anhchinh'=>false,'anhchitiet'=>'jordanjumpman3.png','link'=>'/img/product/jordanjumpman3.png', 'trang_thai'=>true],
            ['id'=> 54, 'san_phams_id'=> 14,'anhchinh'=>false,'anhchitiet'=>'jordanjumpman4.png','link'=>'/img/product/jordanjumpman4.png', 'trang_thai'=>true],

            ['id'=> 55, 'san_phams_id'=> 15,'anhchinh'=>true,'anhchitiet'=>'tatchaybo1.jpg','link'=>'/img/product/tatchaybo1.jpg', 'trang_thai'=>true],
            ['id'=> 56, 'san_phams_id'=> 15,'anhchinh'=>false,'anhchitiet'=>'tatchaybo2.jpg','link'=>'/img/product/tatchaybo2.jpg', 'trang_thai'=>true],
            ['id'=> 57, 'san_phams_id'=> 15,'anhchinh'=>false,'anhchitiet'=>'tatchaybo3.jpg','link'=>'/img/product/tatchaybo3.jpg', 'trang_thai'=>true],
            ['id'=> 58, 'san_phams_id'=> 15,'anhchinh'=>false,'anhchitiet'=>'tatchaybo4.jpg','link'=>'/img/product/tatchaybo4.jpg', 'trang_thai'=>true],

            ['id'=> 59, 'san_phams_id'=> 16,'anhchinh'=>true,'anhchitiet'=>'ult1.jpg','link'=>'/img/product/ult1.jpg', 'trang_thai'=>true],
            ['id'=> 60, 'san_phams_id'=> 16,'anhchinh'=>false,'anhchitiet'=>'ult2.jpg','link'=>'/img/product/ult2.jpg', 'trang_thai'=>true],
            ['id'=> 61, 'san_phams_id'=> 16,'anhchinh'=>false,'anhchitiet'=>'ult3.jpg','link'=>'/img/product/ult3.jpg', 'trang_thai'=>true],
            ['id'=> 62, 'san_phams_id'=> 16,'anhchinh'=>false,'anhchitiet'=>'ult4.jpg','link'=>'/img/product/ult4.jpg', 'trang_thai'=>true],

            ['id'=> 63, 'san_phams_id'=> 17,'anhchinh'=>true,'anhchitiet'=>'quansort1.jpg','link'=>'/img/product/quansort1.jpg', 'trang_thai'=>true],
            ['id'=> 64, 'san_phams_id'=> 17,'anhchinh'=>false,'anhchitiet'=>'quansort2.jpg','link'=>'/img/product/quansort2.jpg', 'trang_thai'=>true],
            ['id'=> 65, 'san_phams_id'=> 17,'anhchinh'=>false,'anhchitiet'=>'quansort3.jpg','link'=>'/img/product/quansort3.jpg', 'trang_thai'=>true],
            ['id'=> 66, 'san_phams_id'=> 17,'anhchinh'=>false,'anhchitiet'=>'quansort4.jpg','link'=>'/img/product/quansort4.jpg', 'trang_thai'=>true],

            ['id'=> 67, 'san_phams_id'=> 18,'anhchinh'=>true,'anhchitiet'=>'stansmithgolf1.jpg','link'=>'/img/product/stansmithgolf1.jpg', 'trang_thai'=>true],
            ['id'=> 68, 'san_phams_id'=> 18,'anhchinh'=>false,'anhchitiet'=>'stansmithgolf2.jpg','link'=>'/img/product/stansmithgolf2.jpg', 'trang_thai'=>true],
            ['id'=> 69, 'san_phams_id'=> 18,'anhchinh'=>false,'anhchitiet'=>'stansmithgolf3.jpg','link'=>'/img/product/stansmithgolf3.jpg', 'trang_thai'=>true],
            ['id'=> 70, 'san_phams_id'=> 18,'anhchinh'=>false,'anhchitiet'=>'stansmithgolf4.jpg','link'=>'/img/product/stansmithgolf4.jpg', 'trang_thai'=>true],

            ['id'=> 71, 'san_phams_id'=> 19,'anhchinh'=>true,'anhchitiet'=>'quangiavay1.jpg','link'=>'/img/product/quangiavay1.jpg', 'trang_thai'=>true],
            ['id'=> 72, 'san_phams_id'=> 19,'anhchinh'=>false,'anhchitiet'=>'quangiavay2.jpg','link'=>'/img/product/quangiavay2.jpg', 'trang_thai'=>true],
            ['id'=> 73, 'san_phams_id'=> 19,'anhchinh'=>false,'anhchitiet'=>'quangiavay3.jpg','link'=>'/img/product/quangiavay3.jpg', 'trang_thai'=>true],
            ['id'=> 74, 'san_phams_id'=> 19,'anhchinh'=>false,'anhchitiet'=>'quangiavay4.jpg','link'=>'/img/product/quangiavay4.jpg', 'trang_thai'=>true],

            ['id'=> 75, 'san_phams_id'=> 20,'anhchinh'=>true,'anhchitiet'=>'mubongchay1.jpg','link'=>'/img/product/mubongchay1.jpg', 'trang_thai'=>true],
            ['id'=> 76, 'san_phams_id'=> 20,'anhchinh'=>false,'anhchitiet'=>'mubongchay2.jpg','link'=>'/img/product/mubongchay2.jpg', 'trang_thai'=>true],
            ['id'=> 77, 'san_phams_id'=> 20,'anhchinh'=>false,'anhchitiet'=>'mubongchay3.jpg','link'=>'/img/product/mubongchay3.jpg', 'trang_thai'=>true],
            ['id'=> 78, 'san_phams_id'=> 20,'anhchinh'=>false,'anhchitiet'=>'mubongchay4.jpg','link'=>'/img/product/mubongchay4.jpg', 'trang_thai'=>true],
            
        ]);
    }
}

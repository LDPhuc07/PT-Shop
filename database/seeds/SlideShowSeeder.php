<?php

use Illuminate\Database\Seeder;

class SlideShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('slideshows')->insert([
            ['id'=> 1, 'slideshow'=>'hieulovebedia', 'link'=>'1.jpg', 'trang_thai'=>true],
            ['id'=> 2, 'slideshow'=>'2.jpg', 'link'=>'2.jpg', 'trang_thai'=>true],
            ['id'=> 3, 'slideshow'=>'3.jpg', 'link'=>'3.jpg', 'trang_thai'=>true],
            // ['id'=> 4, 'slideshow'=>'anh1.jpg', 'link'=>'/img/slideshow/1.jpg', 'trang_thai'=>true],
            // ['id'=> 5, 'slideshow'=>'anh1.jpg', 'link'=>'/img/slideshow/1.jpg', 'trang_thai'=>true],
            // ['id'=> 6, 'slideshow'=>'anh2.jpg', 'link'=>'/img/slideshow/1.jpg', 'trang_thai'=>true],
            // ['id'=> 7, 'slideshow'=>'anh2.jpg', 'link'=>'/img/slideshow/1.jpg', 'trang_thai'=>true],
            // ['id'=> 8, 'slideshow'=>'anh2.jpg', 'link'=>'/img/slideshow/1.jpg', 'trang_thai'=>true],
            // ['id'=> 9, 'slideshow'=>'anh2.jpg', 'link'=>'/img/slideshow/1.jpg', 'trang_thai'=>true],
            // ['id'=> 10, 'slideshow'=>'anh2.jpg', 'link'=>'/img/slideshow/1.jpg', 'trang_thai'=>true],
        ]);
    }
}

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
            ['id'=> 1, 'san_phams_id'=> 1,'anh'=>'adidas.jpg','link'=>null, 'trang_thai'=>true],
            ['id'=> 2, 'san_phams_id'=> 1,'anh'=>'adidas.jpg','link'=>null, 'trang_thai'=>true],
            ['id'=> 3, 'san_phams_id'=> 2,'anh'=>'adidas.jpg','link'=>null, 'trang_thai'=>true],
            ['id'=> 4, 'san_phams_id'=> 2,'anh'=>'adidas.jpg','link'=>null, 'trang_thai'=>true],
            ['id'=> 5, 'san_phams_id'=> 3,'anh'=>'adidas.jpg','link'=>null, 'trang_thai'=>true],
            ['id'=> 6, 'san_phams_id'=> 3,'anh'=>'nike.jpg','link'=>null, 'trang_thai'=>true],
            ['id'=> 7, 'san_phams_id'=> 4,'anh'=>'nike.jpg','link'=>null, 'trang_thai'=>true],
            ['id'=> 8, 'san_phams_id'=> 4,'anh'=>'nike.jpg','link'=>null, 'trang_thai'=>true],
            ['id'=> 9, 'san_phams_id'=> 5,'anh'=>'nike.jpg','link'=>null, 'trang_thai'=>true],
            ['id'=> 10, 'san_phams_id'=> 5,'anh'=>'nike.jpg','link'=>null, 'trang_thai'=>true],
        ]);
    }
}

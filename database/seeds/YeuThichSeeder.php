<?php

use Illuminate\Database\Seeder;

class YeuThichSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('yeu_thiches')->insert([
          ['id'=> 1,'tai_khoans_id'=> 3, 'san_phams_id'=> 4],
          ['id'=> 2,'tai_khoans_id'=> 3, 'san_phams_id'=> 2],
          ['id'=> 3,'tai_khoans_id'=> 3, 'san_phams_id'=> 3],
          ['id'=> 4,'tai_khoans_id'=> 3, 'san_phams_id'=> 4],
          ['id'=> 5,'tai_khoans_id'=> 5, 'san_phams_id'=> 2],
          ['id'=> 6,'tai_khoans_id'=> 5, 'san_phams_id'=> 3],
          ['id'=> 7,'tai_khoans_id'=> 6, 'san_phams_id'=> 4],
          ['id'=> 8,'tai_khoans_id'=> 6, 'san_phams_id'=> 2],
          ['id'=> 9,'tai_khoans_id'=> 3, 'san_phams_id'=> 6],
          ['id'=> 10,'tai_khoans_id'=> 7, 'san_phams_id'=> 4],
      ]);
    }
}

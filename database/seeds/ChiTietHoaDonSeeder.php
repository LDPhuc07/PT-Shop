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
        DB::table('chi_tiet_hoa_dons')->insert([
            ['id'=> 1, 'chi_tiet_san_phams_id'=> 41,'hoa_dons_id'=>1, 'gia_goc'=>20000, 'gia_ban'=>25000, 'so_luong'=>'1'],
            ['id'=> 2, 'chi_tiet_san_phams_id'=> 60,'hoa_dons_id'=>2, 'gia_goc'=>100000, 'gia_ban'=>108000,'so_luong'=>'2'],
            ['id'=> 3, 'chi_tiet_san_phams_id'=> 10,'hoa_dons_id'=>3, 'gia_goc'=>7000000, 'gia_ban'=>8000000,'so_luong'=>'1'],
            ['id'=> 4, 'chi_tiet_san_phams_id'=> 60,'hoa_dons_id'=>4, 'gia_goc'=>100000, 'gia_ban'=>108000,'so_luong'=>'3'],
            ['id'=> 5, 'chi_tiet_san_phams_id'=> 16,'hoa_dons_id'=>5, 'gia_goc'=>6000000, 'gia_ban'=>7000000,'so_luong'=>'1'],
            ['id'=> 6, 'chi_tiet_san_phams_id'=> 32,'hoa_dons_id'=>6, 'gia_goc'=>4000000, 'gia_ban'=>4050000,'so_luong'=>'1'],
            ['id'=> 7, 'chi_tiet_san_phams_id'=> 43,'hoa_dons_id'=>7, 'gia_goc'=>1000000, 'gia_ban'=>1275000,'so_luong'=>'2'],
            ['id'=> 8, 'chi_tiet_san_phams_id'=> 45,'hoa_dons_id'=>8, 'gia_goc'=>1000000, 'gia_ban'=>1275000,'so_luong'=>'2'],
            ['id'=> 9, 'chi_tiet_san_phams_id'=> 52,'hoa_dons_id'=>9, 'gia_goc'=>1000000, 'gia_ban'=>1500000,'so_luong'=>'1'],
            ['id'=> 10, 'chi_tiet_san_phams_id'=> 19,'hoa_dons_id'=>10, 'gia_goc'=>8000000, 'gia_ban'=>9000000,'so_luong'=>'1'],
            // ['id'=> 12, 'chi_tiet_san_phams_id'=> 39,'hoa_dons_id'=>11, 'gia_goc'=>20000, 'gia_ban'=>25000,'so_luong'=>'5'],
            ['id'=> 13, 'chi_tiet_san_phams_id'=> 16,'hoa_dons_id'=>12, 'gia_goc'=>6000000, 'gia_ban'=>7000000,'so_luong'=>'1'],
            ['id'=> 14, 'chi_tiet_san_phams_id'=> 47,'hoa_dons_id'=>13, 'gia_goc'=>100000, 'gia_ban'=>160000,'so_luong'=>'3'],
            ['id'=> 15, 'chi_tiet_san_phams_id'=> 17,'hoa_dons_id'=>14, 'gia_goc'=>6000000, 'gia_ban'=>7000000,'so_luong'=>'2'],
            ['id'=> 16, 'chi_tiet_san_phams_id'=> 57,'hoa_dons_id'=>15, 'gia_goc'=>200000, 'gia_ban'=>250000,'so_luong'=>'3'],
            ['id'=> 17, 'chi_tiet_san_phams_id'=> 37,'hoa_dons_id'=>16, 'gia_goc'=>20000, 'gia_ban'=>25000,'so_luong'=>'6'],
            ['id'=> 18, 'chi_tiet_san_phams_id'=> 28,'hoa_dons_id'=>17, 'gia_goc'=>1000000, 'gia_ban'=>1200000,'so_luong'=>'2'],
            ['id'=> 19, 'chi_tiet_san_phams_id'=> 48,'hoa_dons_id'=>18, 'gia_goc'=>100000, 'gia_ban'=>160000,'so_luong'=>'4'],
            ['id'=> 20, 'chi_tiet_san_phams_id'=> 10,'hoa_dons_id'=>19, 'gia_goc'=>7000000, 'gia_ban'=>8000000,'so_luong'=>'1'],
            ['id'=> 21, 'chi_tiet_san_phams_id'=> 10,'hoa_dons_id'=>20, 'gia_goc'=>7000000, 'gia_ban'=>8000000,'so_luong'=>'1'],
            ['id'=> 22, 'chi_tiet_san_phams_id'=> 25,'hoa_dons_id'=>21, 'gia_goc'=>1200000, 'gia_ban'=>1600000,'so_luong'=>'1'],
            ['id'=> 23, 'chi_tiet_san_phams_id'=> 16,'hoa_dons_id'=>22, 'gia_goc'=>6000000, 'gia_ban'=>7000000,'so_luong'=>'1'],
            
            ['id'=> 24, 'chi_tiet_san_phams_id'=> 56,'hoa_dons_id'=>23, 'gia_goc'=>200000, 'gia_ban'=>250000,'so_luong'=>'3'],
            ['id'=> 25, 'chi_tiet_san_phams_id'=> 46,'hoa_dons_id'=>24, 'gia_goc'=>1000000, 'gia_ban'=>1275000,'so_luong'=>'1'],
            ['id'=> 26, 'chi_tiet_san_phams_id'=> 48,'hoa_dons_id'=>25, 'gia_goc'=>100000, 'gia_ban'=>160000,'so_luong'=>'2'],

            ['id'=> 27, 'chi_tiet_san_phams_id'=> 39,'hoa_dons_id'=>26, 'gia_goc'=>20000, 'gia_ban'=>25000,'so_luong'=>'5'],
            ['id'=> 28, 'chi_tiet_san_phams_id'=> 9,'hoa_dons_id'=>27, 'gia_goc'=>1000000, 'gia_ban'=>1200000,'so_luong'=>'3'],
            ['id'=> 29, 'chi_tiet_san_phams_id'=> 7,'hoa_dons_id'=>28, 'gia_goc'=>1000000, 'gia_ban'=>1200000,'so_luong'=>'1'],
            ['id'=> 30, 'chi_tiet_san_phams_id'=> 5,'hoa_dons_id'=>29, 'gia_goc'=>4000000, 'gia_ban'=>5000000,'so_luong'=>'1'],

            ['id'=> 31, 'chi_tiet_san_phams_id'=> 59,'hoa_dons_id'=>30, 'gia_goc'=>100000, 'gia_ban'=>108000,'so_luong'=>'3'],
            ['id'=> 32, 'chi_tiet_san_phams_id'=> 25,'hoa_dons_id'=>31, 'gia_goc'=>1200000, 'gia_ban'=>1600000,'so_luong'=>'2'],

            ['id'=> 33, 'chi_tiet_san_phams_id'=> 6,'hoa_dons_id'=>32, 'gia_goc'=>4000000, 'gia_ban'=>5000000,'so_luong'=>'2'],
            ['id'=> 34, 'chi_tiet_san_phams_id'=> 4,'hoa_dons_id'=>33, 'gia_goc'=>2000000, 'gia_ban'=>2250000,'so_luong'=>'1'],
            ['id'=> 35, 'chi_tiet_san_phams_id'=> 6,'hoa_dons_id'=>34, 'gia_goc'=>4000000, 'gia_ban'=>5000000,'so_luong'=>'2'],
            ['id'=> 36, 'chi_tiet_san_phams_id'=> 10,'hoa_dons_id'=>35, 'gia_goc'=>7000000, 'gia_ban'=>8000000,'so_luong'=>'2'],
            ['id'=> 37, 'chi_tiet_san_phams_id'=> 26,'hoa_dons_id'=>36, 'gia_goc'=>1200000, 'gia_ban'=>1600000,'so_luong'=>'1'],
            ['id'=> 38, 'chi_tiet_san_phams_id'=> 6,'hoa_dons_id'=>37, 'gia_goc'=>4000000, 'gia_ban'=>5000000,'so_luong'=>'1'],
            ['id'=> 39, 'chi_tiet_san_phams_id'=> 13,'hoa_dons_id'=>38, 'gia_goc'=>2000000, 'gia_ban'=>2400000,'so_luong'=>'1'],
            ['id'=> 40, 'chi_tiet_san_phams_id'=> 4,'hoa_dons_id'=>39, 'gia_goc'=>2000000, 'gia_ban'=>2250000,'so_luong'=>'2'],
            ['id'=> 41, 'chi_tiet_san_phams_id'=> 14,'hoa_dons_id'=>40, 'gia_goc'=>6000000, 'gia_ban'=>7000000, 'so_luong'=>'2'],

            ['id'=> 42, 'chi_tiet_san_phams_id'=> 41,'hoa_dons_id'=>51, 'gia_goc'=>20000, 'gia_ban'=>25000, 'so_luong'=>'1'],
            ['id'=> 43, 'chi_tiet_san_phams_id'=> 60,'hoa_dons_id'=>52, 'gia_goc'=>100000, 'gia_ban'=>108000,'so_luong'=>'2'],
            ['id'=> 44, 'chi_tiet_san_phams_id'=> 10,'hoa_dons_id'=>53, 'gia_goc'=>7000000, 'gia_ban'=>8000000,'so_luong'=>'1'],
            ['id'=> 45, 'chi_tiet_san_phams_id'=> 60,'hoa_dons_id'=>54, 'gia_goc'=>100000, 'gia_ban'=>108000,'so_luong'=>'3'],
            ['id'=> 46, 'chi_tiet_san_phams_id'=> 16,'hoa_dons_id'=>55, 'gia_goc'=>6000000, 'gia_ban'=>7000000,'so_luong'=>'1'],
            ['id'=> 47, 'chi_tiet_san_phams_id'=> 32,'hoa_dons_id'=>56, 'gia_goc'=>4000000, 'gia_ban'=>4050000,'so_luong'=>'1'],
            ['id'=> 48, 'chi_tiet_san_phams_id'=> 43,'hoa_dons_id'=>57, 'gia_goc'=>1000000, 'gia_ban'=>1275000,'so_luong'=>'2'],
            ['id'=> 49, 'chi_tiet_san_phams_id'=> 45,'hoa_dons_id'=>28, 'gia_goc'=>1000000, 'gia_ban'=>1275000,'so_luong'=>'2'],
            ['id'=> 50, 'chi_tiet_san_phams_id'=> 52,'hoa_dons_id'=>29, 'gia_goc'=>1000000, 'gia_ban'=>1500000,'so_luong'=>'1'],
            ['id'=> 51, 'chi_tiet_san_phams_id'=> 19,'hoa_dons_id'=>30, 'gia_goc'=>8000000, 'gia_ban'=>9000000,'so_luong'=>'1'],
            ['id'=> 52, 'chi_tiet_san_phams_id'=> 39,'hoa_dons_id'=>31, 'gia_goc'=>20000, 'gia_ban'=>25000,'so_luong'=>'5'],
            ['id'=> 53, 'chi_tiet_san_phams_id'=> 16,'hoa_dons_id'=>32, 'gia_goc'=>6000000, 'gia_ban'=>7000000,'so_luong'=>'1'],
            ['id'=> 54, 'chi_tiet_san_phams_id'=> 47,'hoa_dons_id'=>33, 'gia_goc'=>100000, 'gia_ban'=>160000,'so_luong'=>'3'],
            ['id'=> 55, 'chi_tiet_san_phams_id'=> 17,'hoa_dons_id'=>34, 'gia_goc'=>6000000, 'gia_ban'=>7000000,'so_luong'=>'2'],
            ['id'=> 56, 'chi_tiet_san_phams_id'=> 57,'hoa_dons_id'=>35, 'gia_goc'=>200000, 'gia_ban'=>250000,'so_luong'=>'3'],
            ['id'=> 57, 'chi_tiet_san_phams_id'=> 37,'hoa_dons_id'=>36, 'gia_goc'=>20000, 'gia_ban'=>25000,'so_luong'=>'6'],
            ['id'=> 58, 'chi_tiet_san_phams_id'=> 28,'hoa_dons_id'=>37, 'gia_goc'=>1000000, 'gia_ban'=>1200000,'so_luong'=>'2'],
            ['id'=> 59, 'chi_tiet_san_phams_id'=> 48,'hoa_dons_id'=>38, 'gia_goc'=>100000, 'gia_ban'=>160000,'so_luong'=>'4'],
            ['id'=> 60, 'chi_tiet_san_phams_id'=> 10,'hoa_dons_id'=>39, 'gia_goc'=>7000000, 'gia_ban'=>8000000,'so_luong'=>'1'],
            ['id'=> 61, 'chi_tiet_san_phams_id'=> 10,'hoa_dons_id'=>40, 'gia_goc'=>7000000, 'gia_ban'=>8000000,'so_luong'=>'1'],
            ['id'=> 62, 'chi_tiet_san_phams_id'=> 25,'hoa_dons_id'=>41, 'gia_goc'=>1200000, 'gia_ban'=>1600000,'so_luong'=>'1'],
            ['id'=> 63, 'chi_tiet_san_phams_id'=> 16,'hoa_dons_id'=>52, 'gia_goc'=>6000000, 'gia_ban'=>7000000,'so_luong'=>'1'],
            
            ['id'=> 64, 'chi_tiet_san_phams_id'=> 56,'hoa_dons_id'=>53, 'gia_goc'=>200000, 'gia_ban'=>250000,'so_luong'=>'3'],
            ['id'=> 65, 'chi_tiet_san_phams_id'=> 46,'hoa_dons_id'=>54, 'gia_goc'=>1000000, 'gia_ban'=>1275000,'so_luong'=>'1'],
            ['id'=> 66, 'chi_tiet_san_phams_id'=> 48,'hoa_dons_id'=>55, 'gia_goc'=>100000, 'gia_ban'=>160000,'so_luong'=>'2'],

            ['id'=> 67, 'chi_tiet_san_phams_id'=> 39,'hoa_dons_id'=>56, 'gia_goc'=>20000, 'gia_ban'=>25000,'so_luong'=>'5'],
            ['id'=> 68, 'chi_tiet_san_phams_id'=> 9,'hoa_dons_id'=>57, 'gia_goc'=>1000000, 'gia_ban'=>1200000,'so_luong'=>'3'],
            ['id'=> 69, 'chi_tiet_san_phams_id'=> 7,'hoa_dons_id'=>28, 'gia_goc'=>1000000, 'gia_ban'=>1200000,'so_luong'=>'1'],
            ['id'=> 70, 'chi_tiet_san_phams_id'=> 5,'hoa_dons_id'=>29, 'gia_goc'=>4000000, 'gia_ban'=>5000000,'so_luong'=>'1'],

            ['id'=> 71, 'chi_tiet_san_phams_id'=> 59,'hoa_dons_id'=>30, 'gia_goc'=>100000, 'gia_ban'=>108000,'so_luong'=>'3'],
            ['id'=> 72, 'chi_tiet_san_phams_id'=> 25,'hoa_dons_id'=>31, 'gia_goc'=>1200000, 'gia_ban'=>1600000,'so_luong'=>'2'],

            ['id'=> 73, 'chi_tiet_san_phams_id'=> 6,'hoa_dons_id'=>32, 'gia_goc'=>4000000, 'gia_ban'=>5000000,'so_luong'=>'2'],
            ['id'=> 74, 'chi_tiet_san_phams_id'=> 4,'hoa_dons_id'=>33, 'gia_goc'=>2000000, 'gia_ban'=>2250000,'so_luong'=>'1'],
            ['id'=> 75, 'chi_tiet_san_phams_id'=> 6,'hoa_dons_id'=>34, 'gia_goc'=>4000000, 'gia_ban'=>5000000,'so_luong'=>'2'],
            ['id'=> 76, 'chi_tiet_san_phams_id'=> 10,'hoa_dons_id'=>35, 'gia_goc'=>7000000, 'gia_ban'=>8000000,'so_luong'=>'2'],
            ['id'=> 77, 'chi_tiet_san_phams_id'=> 26,'hoa_dons_id'=>36, 'gia_goc'=>1200000, 'gia_ban'=>1600000,'so_luong'=>'1'],
            ['id'=> 78, 'chi_tiet_san_phams_id'=> 6,'hoa_dons_id'=>37, 'gia_goc'=>4000000, 'gia_ban'=>5000000,'so_luong'=>'1'],
            ['id'=> 79, 'chi_tiet_san_phams_id'=> 13,'hoa_dons_id'=>38, 'gia_goc'=>2000000, 'gia_ban'=>2400000,'so_luong'=>'1'],
            ['id'=> 80, 'chi_tiet_san_phams_id'=> 4,'hoa_dons_id'=>39, 'gia_goc'=>2000000, 'gia_ban'=>2250000,'so_luong'=>'2'],
            ['id'=> 81, 'chi_tiet_san_phams_id'=> 14,'hoa_dons_id'=>40, 'gia_goc'=>6000000, 'gia_ban'=>7000000, 'so_luong'=>'2'],

            ['id'=> 82, 'chi_tiet_san_phams_id'=> 41,'hoa_dons_id'=>41, 'gia_goc'=>20000, 'gia_ban'=>25000, 'so_luong'=>'1'],
            ['id'=> 83, 'chi_tiet_san_phams_id'=> 60,'hoa_dons_id'=>42, 'gia_goc'=>100000, 'gia_ban'=>108000,'so_luong'=>'2'],
            // ['id'=> 84, 'chi_tiet_san_phams_id'=> 10,'hoa_dons_id'=>43, 'gia_goc'=>7000000, 'gia_ban'=>8000000,'so_luong'=>'1'],
            // ['id'=> 85, 'chi_tiet_san_phams_id'=> 60,'hoa_dons_id'=>44, 'gia_goc'=>100000, 'gia_ban'=>108000,'so_luong'=>'3'],
            // ['id'=> 86, 'chi_tiet_san_phams_id'=> 16,'hoa_dons_id'=>45, 'gia_goc'=>6000000, 'gia_ban'=>7000000,'so_luong'=>'1'],
            // ['id'=> 87, 'chi_tiet_san_phams_id'=> 32,'hoa_dons_id'=>46, 'gia_goc'=>4000000, 'gia_ban'=>4050000,'so_luong'=>'1'],
            // ['id'=> 88, 'chi_tiet_san_phams_id'=> 43,'hoa_dons_id'=>47, 'gia_goc'=>1000000, 'gia_ban'=>1275000,'so_luong'=>'2'],
            // ['id'=> 89, 'chi_tiet_san_phams_id'=> 45,'hoa_dons_id'=>48, 'gia_goc'=>1000000, 'gia_ban'=>1275000,'so_luong'=>'2'],
            // ['id'=> 90, 'chi_tiet_san_phams_id'=> 52,'hoa_dons_id'=>49, 'gia_goc'=>1000000, 'gia_ban'=>1500000,'so_luong'=>'1'],
            // ['id'=> 91, 'chi_tiet_san_phams_id'=> 19,'hoa_dons_id'=>50, 'gia_goc'=>8000000, 'gia_ban'=>9000000,'so_luong'=>'1'],
            // ['id'=> 92, 'chi_tiet_san_phams_id'=> 39,'hoa_dons_id'=>61, 'gia_goc'=>20000, 'gia_ban'=>25000,'so_luong'=>'5'],
            // ['id'=> 93, 'chi_tiet_san_phams_id'=> 16,'hoa_dons_id'=>62, 'gia_goc'=>6000000, 'gia_ban'=>7000000,'so_luong'=>'1'],
            // ['id'=> 94, 'chi_tiet_san_phams_id'=> 47,'hoa_dons_id'=>63, 'gia_goc'=>100000, 'gia_ban'=>160000,'so_luong'=>'3'],
            // ['id'=> 95, 'chi_tiet_san_phams_id'=> 17,'hoa_dons_id'=>64, 'gia_goc'=>6000000, 'gia_ban'=>7000000,'so_luong'=>'2'],
            ['id'=> 96, 'chi_tiet_san_phams_id'=> 57,'hoa_dons_id'=>58, 'gia_goc'=>200000, 'gia_ban'=>250000,'so_luong'=>'3'],
            ['id'=> 97, 'chi_tiet_san_phams_id'=> 37,'hoa_dons_id'=>59, 'gia_goc'=>20000, 'gia_ban'=>25000,'so_luong'=>'6'],
            ['id'=> 98, 'chi_tiet_san_phams_id'=> 28,'hoa_dons_id'=>60, 'gia_goc'=>1000000, 'gia_ban'=>1200000,'so_luong'=>'2'],
            ['id'=> 99, 'chi_tiet_san_phams_id'=> 48,'hoa_dons_id'=>58, 'gia_goc'=>100000, 'gia_ban'=>160000,'so_luong'=>'4'],
            ['id'=> 100, 'chi_tiet_san_phams_id'=> 10,'hoa_dons_id'=>59, 'gia_goc'=>7000000, 'gia_ban'=>8000000,'so_luong'=>'1'],
            ['id'=> 101, 'chi_tiet_san_phams_id'=> 10,'hoa_dons_id'=>60, 'gia_goc'=>7000000, 'gia_ban'=>8000000,'so_luong'=>'1'],
            // ['id'=> 102, 'chi_tiet_san_phams_id'=> 25,'hoa_dons_id'=>61, 'gia_goc'=>1200000, 'gia_ban'=>1600000,'so_luong'=>'1'],
            // ['id'=> 103, 'chi_tiet_san_phams_id'=> 16,'hoa_dons_id'=>62, 'gia_goc'=>6000000, 'gia_ban'=>7000000,'so_luong'=>'1'],
        ]);
    }

}

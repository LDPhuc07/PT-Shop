<?php

use Illuminate\Database\Seeder;

class NhaSanXuatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('nha_san_xuats')->insert([
            ['id'=> 1, 'ten_nha_san_xuat'=>'nike','trang_thai'=>true],
            ['id'=> 2, 'ten_nha_san_xuat'=>'adidas','trang_thai'=>true],
            ['id'=> 3, 'ten_nha_san_xuat'=>'puma','trang_thai'=>true],
            ['id'=> 4, 'ten_nha_san_xuat'=>'under armour','trang_thai'=>true],
            ['id'=> 5, 'ten_nha_san_xuat'=>'kappa','trang_thai'=>true],
            ['id'=> 6, 'ten_nha_san_xuat'=>'fila','trang_thai'=>true],
            ['id'=> 7, 'ten_nha_san_xuat'=>'asics','trang_thai'=>true],
            ['id'=> 8, 'ten_nha_san_xuat'=>'dks','trang_thai'=>true],
            ['id'=> 9, 'ten_nha_san_xuat'=>'x storm','trang_thai'=>true],
            ['id'=> 10, 'ten_nha_san_xuat'=>'wika','trang_thai'=>true],
        ]);
    }
}

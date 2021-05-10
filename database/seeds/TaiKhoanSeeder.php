<?php

use Illuminate\Database\Seeder;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tai_khoans')->insert([
            ['id'=> 1, 'ho_ten'=>'Nguyễn Văn A','email'=>'abc@gmail.com', 'mat_khau'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456789', 'dia_chi'=>'khánh hòa', 'admin'=>true, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 2, 'ho_ten'=>'Nguyễn Văn B','email'=>'bbc@gmail.com', 'mat_khau'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456789', 'dia_chi'=>'khánh hòa', 'admin'=>true, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 3, 'ho_ten'=>'Nguyễn Văn V','email'=>'cbc@gmail.com', 'mat_khau'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456789', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 4, 'ho_ten'=>'Nguyễn Văn D','email'=>'dbc@gmail.com', 'mat_khau'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456789', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 5, 'ho_ten'=>'Nguyễn Văn E','email'=>'ebc@gmail.com', 'mat_khau'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456789', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 6, 'ho_ten'=>'Nguyễn Văn F','email'=>'fbc@gmail.com', 'mat_khau'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456789', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 7, 'ho_ten'=>'Nguyễn Văn G','email'=>'gbc@gmail.com', 'mat_khau'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456789', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 8, 'ho_ten'=>'Nguyễn Văn H','email'=>'hbc@gmail.com', 'mat_khau'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456789', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 9, 'ho_ten'=>'Nguyễn Văn K','email'=>'kbc@gmail.com', 'mat_khau'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456789', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 10, 'ho_ten'=>'Nguyễn Văn M','email'=>'mbc@gmail.com', 'mat_khau'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456789', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
        ]);
    }
}

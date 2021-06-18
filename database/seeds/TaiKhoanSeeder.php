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
            ['id'=> 1,'anh_dai_dien'=>'avatar1.png', 'ho_ten'=>'Nguyễn Văn A','email'=>'abc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456789', 'dia_chi'=>'khánh hòa', 'admin'=>true, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 2, 'ho_ten'=>'Nguyễn Văn B','email'=>'bbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456788', 'dia_chi'=>'khánh hòa', 'admin'=>true, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 3, 'ho_ten'=>'Nguyễn Văn V','email'=>'cbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456787', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 4, 'ho_ten'=>'Nguyễn Văn D','email'=>'dbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456786', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 5, 'ho_ten'=>'Nguyễn Văn E','email'=>'ebc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456785', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 6, 'ho_ten'=>'Nguyễn Văn A','email'=>'fbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456784', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 7, 'ho_ten'=>'Nguyễn Văn A','email'=>'gbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456783', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 8, 'ho_ten'=>'Nguyễn Văn H','email'=>'hbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456782', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 9, 'ho_ten'=>'Nguyễn Văn K','email'=>'kbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456781', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 10, 'ho_ten'=>'Nguyễn Văn M','email'=>'mbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456709', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
        ]);
    }
}

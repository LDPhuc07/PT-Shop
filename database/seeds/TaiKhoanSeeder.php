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
            ['id'=> 1,'anh_dai_dien'=>'meo1.jpg', 'ho_ten'=>'Nguyễn Văn Ao','email'=>'abc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456789', 'dia_chi'=>'khánh hòa', 'admin'=>true, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 2,'anh_dai_dien'=>'meo2.jpg', 'ho_ten'=>'Nguyễn Văn Bảo','email'=>'bbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456788', 'dia_chi'=>'khánh hòa', 'admin'=>true, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 3,'anh_dai_dien'=>'meo3.jpg', 'ho_ten'=>'Bùi Thị Xuân','email'=>'cbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456787', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 4,'anh_dai_dien'=>'meo4.jpg', 'ho_ten'=>'Nguyễn Văn Trí','email'=>'dbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456786', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 5,'anh_dai_dien'=>'meo5.jpg', 'ho_ten'=>'Nguyễn Văn Em','email'=>'ebc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456785', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 6,'anh_dai_dien'=>'meo6.jpg', 'ho_ten'=>'Nguyễn Quốc Trung','email'=>'fbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456784', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 7,'anh_dai_dien'=>'meo7.jpg', 'ho_ten'=>'Phạm Văn An','email'=>'gbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456783', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 8,'anh_dai_dien'=>'meo8.jpg', 'ho_ten'=>'Lê Đức Hào','email'=>'hbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456782', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 9,'anh_dai_dien'=>'vario.jpg', 'ho_ten'=>'Lê Văn Luyện','email'=>'kbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456781', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
            ['id'=> 10,'anh_dai_dien'=>'vario2.jpg', 'ho_ten'=>'Nguyễn Văn Mách','email'=>'mbc@gmail.com', 'password'=>bcrypt('123456'), 'so_dien_thoai'=>'0123456709', 'dia_chi'=>'khánh hòa', 'admin'=>false, 'remember_token'=>null, 'trang_thai'=>true],
        ]);
    }
}

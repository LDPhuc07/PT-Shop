<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NhaSanXuatSeeder::class);
        $this->call(MonTheThaoSeeder::class);
        $this->call(LoaiSanPhamSeeder::class);
        $this->call(SanPhamSeeder::class);
        $this->call(TaiKhoanSeeder::class);
        $this->call(ChiTietSanPhamSeeder::class);
        $this->call(AnhSeeder::class);
        $this->call(HoaDonSeeder::class);
        $this->call(ChiTietHoaDonSeeder::class);
        $this->call(SlideShowSeeder::class);
        $this->call(BinhLuanSeeder::class);
    }
    
}

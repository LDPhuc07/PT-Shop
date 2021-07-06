<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    protected $table = 'gio_hangs';

    public function taiKhoan()
    {
        return $this->belongsTo('App\TaiKhoan', 'tai_khoans_id', 'id');
    }

    public function chiTietSanPham()
    {
        return $this->belongsTo('App\ChiTietSanPham', 'chi_tiet_san_phams_id', 'id');
    }
}

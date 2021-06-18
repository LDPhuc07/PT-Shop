<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    protected $table = 'danh_gias';

    public function taiKhoan()
    {
        return $this->belongsTo('App\TaiKhoan', 'tai_khoans_id', 'id');
    }

    public function sanPham()
    {
        return $this->belongsTo('App\SanPham', 'san_phams_id', 'id');
    }
}

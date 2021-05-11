<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'san_phams';

    public function anh()
    {
        return this->hasMany('App\Anh', 'san_phams_id', 'id');
    }

    public function chiTietHoaDon()
    {
        return this->hasMany('App\ChiTietHoaDon', 'san_phams_id', 'id');
    }

    public function nhaSanXuat()
    {
        return this->belongsTo('App\NhaSanXuat', 'san_phams_id', 'id');
    }

    public function monTheThao()
    {
        return this->belongsTo('App\MonTheThao', 'san_phams_id', 'id');
    }

    public function loaiSanPham()
    {
        return this->belongsTo('App\LoaiSanPham', 'san_phams_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YeuThich extends Model
{
    protected $table = 'yeu_thiches';

    public function taiKhoan()
    {
        return $this->belongsTo('App\TaiKhoan', 'tai_khoans_id', 'id');
    }

    public function sanPham()
    {
        return $this->belongsTo('App\SanPham', 'san_phams_id', 'id');
    }
}

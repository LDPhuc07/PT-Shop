<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    protected $table = 'loai_san_phams';

    public function sanPham()
    {
        return $this->hasMany('App\SanPham', 'san_phams_id', 'id');
    }
}

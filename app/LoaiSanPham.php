<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LoaiSanPham extends Model
{
    protected $table = 'loai_san_phams';
    use SoftDeletes;
    public function sanPham()
    {
        return $this->hasMany('App\SanPham', 'san_phams_id', 'id');
    }
}

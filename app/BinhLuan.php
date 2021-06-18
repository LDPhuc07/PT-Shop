<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BinhLuan extends Model
{
    //
    protected $table = 'binh_luans';
    use SoftDeletes;
    public function sanPham()
    {
        return $this->belongsTo('App\SanPham', 'san_phams_id', 'id');
    }
    public function taiKhoan()
    {
        return $this->belongsTo('App\TaiKhoan', 'tai_khoans_id', 'id');
    }
}

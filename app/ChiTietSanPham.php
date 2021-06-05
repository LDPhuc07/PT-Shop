<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ChiTietSanPham extends Model
{
    protected $table = 'chi_tiet_san_phams';
    use SoftDeletes;
    public function chiTietSanPham()
    {
        return $this->belongsTo('App\ChiTietSanPham', 'chi_tiet_san_phams_id', 'id');
    }

}

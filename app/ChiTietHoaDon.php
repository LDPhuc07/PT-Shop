<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    protected $table = 'chi_tiet_hoa_dons';

    public function hoaDon()
    {
        return $this->belongsTo('App\HoaDon', 'hoa_dons_id', 'id');
    }

    public function chiTietSanPham()
    {
        return $this->belongsTo('App\ChiTietSanPham', 'chi_tiet_san_phams_id', 'id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoa_dons';
    
    
    public function chiTietHoaDon()
    {
        return $this->hasMany('App\ChiTietHoaDon', 'hoa_dons_id', 'id');
    }

    public function taiKhoan()
    {
        return $this->belongsTo('App\TaiKhoan', 'tai_khoans_id', 'id');
    }
    
}

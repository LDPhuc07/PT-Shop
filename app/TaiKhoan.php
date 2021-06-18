<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    protected $table = 'tai_khoans';

    // public function hoaDon()
    // {
    //     return this->hasMany('App\HoaDon', 'tai_khoans_id', 'id');
    // }
    public function taiKhoanYeuThich()
    {
        return $this->hasMany('App\YeuThich', 'tai_khoans_id', 'id');
    }
    public function binhLuan()
    {
        return $this->hasMany('App\BinhLuan', 'tai_khoans_id', 'id');
    }
}

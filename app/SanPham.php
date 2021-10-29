<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Anh;
class SanPham extends Model
{
    protected $table = 'san_phams';
    use SoftDeletes;
    public function anh()
    {
        return $this->hasMany('App\Anh', 'san_phams_id', 'id');
    }

    public function chiTietHoaDon()
    {
        return $this->hasMany('App\ChiTietHoaDon', 'san_phams_id', 'id');
    }

    public function nhaSanXuat()
    {
        return $this->belongsTo('App\NhaSanXuat', 'nha_san_xuats_id', 'id');
    }

    public function monTheThao()
    {
        return $this->belongsTo('App\MonTheThao', 'mon_the_thaos_id', 'id');
    }

    public function loaiSanPham()
    {
        return $this->belongsTo('App\LoaiSanPham', 'loai_san_phams_id', 'id');
    }
    public function chiTietSanPham()
    {
        return $this->hasMany('App\ChiTietSanPham', 'san_phams_id', 'id');
    }
    public function yeuThichSanPham()
    {
        return $this->hasMany('App\YeuThich', 'san_phams_id', 'id');
    }
    public function binhLuan()
    {
        return $this->hasMany('App\BinhLuan', 'san_phams_id','id');
    }
    public function getImage()
    {
        $anh = Anh::where('san_phams_id',$this->id)->first();
        // dd($anh);
        if(empty($anh)) return;

        return $anh->link;
    }
}

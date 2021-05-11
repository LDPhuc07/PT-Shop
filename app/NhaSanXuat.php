<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    protected $table = 'nha_san_xuats';

    public function SanPham()
    {
        return this->hasMany('App\SanPham', 'san_phams_id', 'id');
    }
}

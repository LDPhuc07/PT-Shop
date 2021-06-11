<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class NhaSanXuat extends Model
{
    protected $table = 'nha_san_xuats';
    use SoftDeletes;
    public function SanPham()
    {
        return $this->hasMany('App\SanPham', 'san_phams_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MonTheThao extends Model
{
    protected $table = 'mon_the_thaos';
    use SoftDeletes;
    public function sanPham()
    {
        return $this->hasMany('App\SanPham', 'san_phams_id', 'id');
    }
}

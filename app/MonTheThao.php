<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonTheThao extends Model
{
    protected $table = 'mon_the_thaos';

    public function sanPham()
    {
        return this->hasMany('App\SanPham', 'san_phams_id', 'id');
    }
}

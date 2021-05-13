<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anh extends Model
{
    protected $table = 'anhs';
 
    public function sanPham()
    {
        return $this->belongsTo('App\SanPham', 'san_phams_id', 'id');
    }
    
}

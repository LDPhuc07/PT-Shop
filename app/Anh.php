<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Anh extends Model
{
    protected $table = 'anhs';
    use SoftDeletes;
    public function sanPham()
    {
        return $this->belongsTo('App\SanPham', 'san_phams_id', 'id');
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MangXaHoi extends Model
{
    protected $table = 'mang_xa_hoi';
    use SoftDeletes;

    public function taiKhoan(){
        return $this->belongsTo('App\TaiKhoan', 'tai_khoans_id', 'id');
    }
}

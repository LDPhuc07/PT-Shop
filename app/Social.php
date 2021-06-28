<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'provider_user_id','provider','tai_khoans_id'
    ];

    protected $primaryKey = 'id';
        protected $table = 'social';
        public function loGin(){
            return $this->belongsTo('App\TaiKhoan', 'tai_khoans_id', 'id');
        }

}

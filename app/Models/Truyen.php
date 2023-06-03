<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;



    protected $dates = [
        'created_at',
        'updated_at'
        // your other new column
    ];

    public $timestamps = false;

    protected $fillable=[
        'ten_tr', 'slug_tr', 'tomtat', 'kichhoat', 'hinh','danhmuc_id', 'theloai_id','created_at','updated_at',
    ];
    protected $primary = 'id';
    protected $table = 'truyen';

    public function danhmuctruyen(){
        return $this->belongsTo('App\Models\Danhmuc','danhmuc_id','id');
    }
    public function chapter(){
        return $this->hasMany('App\Models\Chapter');
    }
    public function theloai(){
        return $this->belongsTo('App\Models\Theloai','theloai_id','id');
    }
    public function thuocnhieudanhmuc(){
        return $this->belongsToMany(Danhmuc::class,'thuocmuc','truyen_id','danhmuc_id');
    }
    public function thuocnhieutheloai(){
        return $this->belongsToMany(Theloai::class,'thuocloai','truyen_id','theloai_id');
    }
}

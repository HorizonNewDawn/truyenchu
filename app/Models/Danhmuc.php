<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'tendanhmuc', 'slug_danhmuc', 'mota', 'kichhoat',
    ];
    protected $primary = 'id';
    protected $table = 'danhmuc';

    public function truyen(){
        return $this->hasMany('App\Models\Truyen');
    }
}

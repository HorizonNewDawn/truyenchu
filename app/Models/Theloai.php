<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theloai extends Model
{
    use HasFactory;

    use HasFactory;
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'tentheloai', 'mota', 'slug_theloai', 'kichhoat'
    ];
    protected $primary = 'id';
    protected $table = 'theloai';

    public function truyen(){
        return $this->hasMany('App\Models\Truyen');
    }
}

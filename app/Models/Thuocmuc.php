<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thuocmuc extends Model
{
    use HasFactory;

    protected $fillable=[
        'truyen_id','danhmuc_id'
    ];
    protected $primaryKey= 'id';
    protected $table ='thuocmuc';
}

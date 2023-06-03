<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=[
        'username', 'email', 'password'
    ];
    // protected $primary = 'id';
    protected $table = 'publishers';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theodoi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=[
        'title', 'image', 'status','publisher_id'
    ];
    // protected $primary = 'id';
    protected $table = 'theodoi';
    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }
}

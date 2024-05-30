<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiPhongs extends Model
{
    use HasFactory;

    function PhongTros(){
        return $this->belongsTo(PhongTros::class)
    }
}

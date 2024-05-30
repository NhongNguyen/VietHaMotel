<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HopDongs extends Model
{
    use HasFactory;

    function PhongTros(){
        return $this->belongsTo(PhongTros::class, 'id_phong_tro');
    }

    function KhachThues(){
        return $this->belongsTo(KhachThues::class, 'id_phong_tro');
    }
}

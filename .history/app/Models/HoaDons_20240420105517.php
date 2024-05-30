<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDons extends Model
{
    use HasFactory;

    function PhongTros(){
        return $this->belongsTo(PhongTros::class,'id_phong_tro');
    }

        
    function HopDongs(){
        return $this->belongsTo(HoaDons::class,'id_hop_dong');
    }
    
}

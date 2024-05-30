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

    // Định nghĩa mối quan hệ với hợp đồng
    public function hopdongs()
    {
        return $this->hasMany(HopDongs::class, 'id_khach_thue');
    }
    
    function LoaiPhongs(){
        return $this->belongsTo(LoaiPhongs::class, 'id_loai_phong');
    }
}

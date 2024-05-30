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
        return $this->belongsTo(KhachThues::class, 'id_khach_thue');
    }
    function LoaiPhongs(){
        return $this->belongsTo(LoaiPhongs::class, 'id_loai_phong');
    }
    function HoaDons(){
        return $this->hasOne(ChiTietHoaDons::class, 'id_hop_dong');
    }

    protected $fillable = ['id_phong_tro', 'id_loai_phong', 'id_khach_thue', 'giaDatCoc', 'ngayBatDau', 'ngayKetThuc'];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonDichVus extends Model
{
    use HasFactory;

    function ChiTietHoaDons(){
        return $this->belongsTo(ChiTietHoaDons::class, 'id_chi_tiet_hoa_don');
    }

    function DichVus(){
        return $this->belongsTo(DichVus::class, 'id_dich_vu');    
    }
}

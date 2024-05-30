<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDons extends Model
{
    use HasFactory;
    protected $fillable = ['id_hoa_don', 'soNgayThue', 'daThanhToan', 'thanhTien']; // Thêm thanhTien vào mảng fillable


    function HoaDons(){
        return $this->belongsTo(HoaDons::class,'id_hoa_don');
    }

    function ChiTietHoaDonDichVus(){
        return $this->hasMany(ChiTietHoaDonDichVus::class,'id_chi_tiet_hoa_don');
    }

}

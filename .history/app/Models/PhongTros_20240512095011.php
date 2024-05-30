<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTros extends Model
{
    use HasFactory;
    
    protected $table = 'phong_tros';

    protected $fillable = [
        'id_khach_thue',
        'id_thanh_vien',
        
    ];

    public function loaiPhongs()
    {
        return $this->belongsTo(LoaiPhongs::class, 'id_loai_phong');
    }

    public function khachThues()
    {
        return $this->belongsTo(KhachThues::class, 'id_khach_thue');
    }

    public function thanhViens()
    {
        return $this->belongsTo(ThanhViens::class, 'id_thanh_vien');
    }
    public function hinhAnhPhongTros()
    {
        return $this->hasMany(HinhAnhPhongTros::class, 'id_phong_tro');
    }
}

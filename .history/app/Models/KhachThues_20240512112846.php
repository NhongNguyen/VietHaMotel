<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachThues extends Model
{
    use HasFactory;

    protected $fillable = ['id_hoa_don', 'soNgayThue', 'daThanhToan', 'thanhTien'];
    
    public function hopdong()
    {
        return $this->hasMany(HopDongs::class, 'id_khach_thue');
    }
    public function phongtro()
    {
        return $this->hasMany(HopDongs::class, 'id_khach_thue');
    }
}

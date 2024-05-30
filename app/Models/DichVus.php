<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVus extends Model
{
    use HasFactory;
    
    public function ChiTietHoaDonDichVus()
    {
        return $this->hasMany(ChiTietHoaDonDichVus::class, 'id_dich_vu');
    }
}

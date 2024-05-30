<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDons extends Model
{
    use HasFactory;

    protected $fillable = ['tongTien'];

    function PhongTros(){
        return $this->belongsTo(PhongTros::class,'id_phong_tro');
    }   
    function HopDongs(){
        return $this->belongsTo(HopDongs::class,'id_hop_dong');
    }
    public function chiTietHoaDons()
    {
        return $this->hasMany(ChiTietHoaDons::class, 'id_hoa_don');
    }    

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanhViens extends Model
{
    protected $fillable = ['id', 'id_khach_thue'];
    use HasFactory;
    public function phongtro()
    {
        return $this->hasMany(PhongTros::class, 'id_thanh_vien');
    }
}

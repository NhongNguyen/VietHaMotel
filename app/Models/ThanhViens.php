<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanhViens extends Model
{
    use HasFactory;
    public function phongtro()
    {
        return $this->hasMany(PhongTros::class, 'id_thanh_vien');
    }
}

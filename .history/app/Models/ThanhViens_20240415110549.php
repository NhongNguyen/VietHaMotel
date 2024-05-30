<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanhViens extends Model
{
    use HasFactory;
    public function hopdong()
    {
        return $this->hasMany(HopDongs::class, 'id_khach_thue');
    }
}

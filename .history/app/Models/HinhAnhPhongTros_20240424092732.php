<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnhPhongTros extends Model
{
    use HasFactory;

    public function phongtros(){
    return $this->belongsTo(PhongTros::class,'id_phong_tro'); //
}

}

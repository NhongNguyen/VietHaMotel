<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanTriViens extends Model
{
    use HasFactory;
    protected $table = 'quan_tri_viens';
    public $timestamps = false; // Tắt tính năng tự động tạo các cột timestamps
    // Các thuộc tính và phương thức khác của model

}

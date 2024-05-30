<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiPhongs;
use App\Models\DichVus;
use App\Models\PhongTros;

class HomeController extends Controller
{

    // Home Page
    function home(){
        $dichvus=DichVus::all();
        $loaiphongs=LoaiPhongs::all();
        $phongtros=PhongTros::all();
        $countPhongTros = $this->countPhongTros(); // Số lượng phòng trọ
        return View('home',['loaiphongs'=>$loaiphongs,'dichvus'=>$dichvus,'phongtros'=>$phongtros,'countPhongTros' => $countPhongTros]);
    }
     // Đếm số lượng phòng trọ
     function countPhongTros() {
        return PhongTros::count();
    }
}

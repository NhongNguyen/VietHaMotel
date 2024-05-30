<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiPhongs;
use App\Models\DichVus;
use App\Models\PhongTros;
use App\Models\KhachThues;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Home Page
    public function home(){
        $dichvus = DichVus::all();
        $loaiphongs = LoaiPhongs::all();
        $phongtros = PhongTros::all();
        $countPhongTros = $this->countPhongTros(); // Số lượng phòng trọ
        return view('home', ['loaiphongs' => $loaiphongs, 'dichvus' => $dichvus, 'phongtros' => $phongtros, 'countPhongTros' => $countPhongTros]);
    }
    
    // Đếm số lượng phòng trọ
    public function countPhongTros() {
        return PhongTros::count();
    }
    
    public function dangKiPhong(Request $request) {
        $phongId = $request->input('phong_id');
        $khachthue = session('khachthuelogin');
        $data = PhongTros::findOrFail($phongId);
    
        if (session()->has('khachthuelogin')) {
            if (is_array($khachthue) && array_key_exists('id', $khachthue)) {
                $idKhachThue = $khachthue['id'];
            } else {
                $idKhachThue = null;
            }
            return view('member', ['phong_id' => $phongId, 'data' => $data, 'idKhachThue' => $idKhachThue]);
        } else {
            return view('frontlogin');
        }
    }
    
    // Home Page
    public function myroom() {
        return view('myroom');
    }
    // Home Page
    public function myroom() {
        return view('myroom');
    }
}

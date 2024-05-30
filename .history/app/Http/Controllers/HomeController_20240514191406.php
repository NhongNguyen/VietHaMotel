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
    public function home() {
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

        // Check for logged in user
        if (session()->has('khachthuelogin') && is_array($khachthue)) {
            $idKhachThue = $khachthue['id'] ?? null;
            return view('member', ['phong_id' => $phongId, 'data' => $data, 'idKhachThue' => $idKhachThue]);
        } else {
            return view('frontlogin');
        }
    }

    // Home Page
    public function myroom() {
        $dichvus = DichVus::all();
        $loaiphongs = LoaiPhongs::all();
        $phongtros = PhongTros::all();

        // Lấy thông tin khách hàng từ session
        $khachthue = session('khachthuelogin');

        // Kiểm tra xem có thông tin khách hàng trong session không
        $khachthueId = null;
        $khachthueName = null;

        if (is_array($khachthue)) {
            $khachthueId = $khachthue['id'] ?? null;
            $khachthueName = $khachthue['tenKhach'] ?? null;
        }

        return view('myroom', [
            'loaiphongs' => $loaiphongs,
            'dichvus' => $dichvus,
            'phongtros' => $phongtros,
            'khachthueId' => $khachthueId,
            'khachthueName' => $khachthueName
        ]);
    }
}

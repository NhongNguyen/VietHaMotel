<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiPhongs;
use App\Models\DichVus;
use App\Models\PhongTros;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dichvus = DichVus::all();
        $loaiphongs = LoaiPhongs::all();
        $phongtros = PhongTros::all();
        $countPhongTros = $this->countPhongTros(); // Số lượng phòng trọ
        return view('home', ['loaiphongs' => $loaiphongs, 'dichvus' => $dichvus, 'phongtros' => $phongtros, 'countPhongTros' => $countPhongTros]);
    }

    /**
     * Đếm số lượng phòng trọ
     */
    private function countPhongTros()
    {
        return PhongTros::count();
    }

    /**
     * Action xử lý việc đăng kí phòng
     */
    public function dangKiPhong(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (session()->has('khachthuelogin')) {
            // Nếu đã đăng nhập, hiển thị form chọn thành viên
            return view('form_chon_thanh_vien');
        } else {
            // Nếu chưa đăng nhập, chuyển hướng người dùng đến trang đăng nhập
            return redirect()->route('login');
        }
    }
}

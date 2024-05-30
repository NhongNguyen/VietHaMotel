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
     // Action xử lý việc đăng kí phòng
     function dangKiPhong(Request $request) {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check()) {
            // Nếu đã đăng nhập, hiển thị form chọn thành viên
            return view('form_chon_thanh_vien');
        } else {
            // Nếu chưa đăng nhập, chuyển hướng người dùng đến trang đăng nhập
            return redirect()->route('login');
        }
    }
}

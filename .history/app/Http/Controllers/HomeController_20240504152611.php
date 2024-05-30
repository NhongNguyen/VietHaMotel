<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiPhongs;
use App\Models\DichVus;
use App\Models\PhongTros;
use Illuminate\Support\Facades\Auth;

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
        if(session()->has('khachthuelogin')){
            // Nếu đã đăng nhập, kiểm tra loại thành viên được chọn
            $option = $request->input('inlineRadioOptions');

            if ($option == 'mem') {
                // Nếu chọn có thành viên, chuyển hướng tới trang memregister
                return view('memregister');
            } else {
                // Nếu chọn không thành viên, chuyển hướng tới trang khác (ví dụ: frontlogin)
                return view('frontlogin');
            }
        } else {
            // Nếu chưa đăng nhập, chuyển hướng người dùng đến trang đăng nhập
            return view('frontlogin');
        }
    }
}
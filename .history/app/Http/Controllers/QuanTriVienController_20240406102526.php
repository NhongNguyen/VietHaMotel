<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\QuanTriViens;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cookie;

class QuanTriVienController extends Controller
{
    //Hàm đăng nhập
    function login(){
        return view('login');
    }

    //Hàm kiểm tra tài khoản mật khẩu đăng nhập 
    function kiem_tra_dang_nhap(Request $request){
        $request->validate([
            'tenqtv' => 'required',
            'matkhau' => 'required',
        ]);
        $qtv = QuanTriViens::where(['tenqtv'=>$request->tenQTV,'matkhau'=>sha1($request->matKhau)])->count();
        if($qtv>0){
            $qtvData=QuanTriViens::where('tenqtv'=>$re)
        }
    }
}

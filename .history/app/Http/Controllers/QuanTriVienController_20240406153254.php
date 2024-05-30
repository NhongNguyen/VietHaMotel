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
    function dang_nhap(){
        return view('login');
    }

    //Hàm kiểm tra tài khoản mật khẩu đăng nhập 
    function kiemtra_dangnhap(Request $request){
        $request->validate([
            'tenqtv' => 'required',
            'matkhau' => 'required',
        ]);
        $qtv = QuanTriViens::where(['tenqtv'=>$request->tenQTV,'matkhau'=>sha1($request->matKhau)])->count();
        if($qtv>0){
            $adminData=QuanTriViens::where(['tenqtv'=>$request->tenQTV,'matkhau'=>$request->matKhau])->get();
            session(['adminData'=>$qtvData]);

            if($request->has('rememberme')){
                Cookie::queue('qtvtenqtv',$request->tenQTV,43200);
                Cookie::queue('qtvmatkhau',$request->matKhau,43200);
            }
            return redirect('qtv');
        }else{
            return redirect('admin/login')->with('msg','Nhập tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại!!');
        }
    }
}

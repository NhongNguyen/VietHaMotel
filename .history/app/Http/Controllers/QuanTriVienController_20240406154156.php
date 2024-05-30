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
            'sdt' => 'required',
            'matkhau' => 'required',
        ]);
        $admin = QuanTriViens::where(['sdt'=>$request->SDT,'matkhau'=>sha1($request->matKhau)])->count();
        if($admin>0){
            $adminData=QuanTriViens::where(['sdt'=>$request->SDT,'matkhau'=>$request->matKhau])->get();
            session(['adminData'=>$adminData]);

            if($request->has('rememberme')){
                Cookie::queue('sdt',$request->tenQTV,43200);
                Cookie::queue('qtvmatkhau',$request->matKhau,43200);
            }
            return redirect('admin');
        }else{
            return redirect('admin/login')->with('msg','Nhập tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại!!');
        }
    }
}

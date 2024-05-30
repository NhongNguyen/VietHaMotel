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
        return view('dangnhap_qtv');
    }

    //Hàm kiểm tra tài khoản mật khẩu đăng nhập 
    function kiemtra_dangnhap(Request $request){
        $request->validate([
            'taikhoan' => 'required',
            'matkhau' => 'required',
        ]);
        $qtv = QuanTriViens::where(['tenqtv'=>$request->tenQTV,'matkhau'=>sha1($request->matKhau)])->count();
        if($qtv>0){
            $qtvData=QuanTriViens::where(['tenqtv'=>$request->tenQTV,'matkhau'=>$request->matKhau])->get();
            session(['qtvData'=>$qtvData]);

            if($request->has('rememberme')){
                Cookie::queue('qtvtaikhoan',$request->tenQTV,43200);
                Cookie::queue('qtvmatkhau',$request->matKhau,43200);
            }

            return redirect('qtv');
        }else{
            return redirect('qtv/dangNhap')->with('msg','Nhập tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại!!');
        }
    }
}

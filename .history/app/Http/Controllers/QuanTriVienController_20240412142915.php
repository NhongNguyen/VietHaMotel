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
            'SDT' => 'required',
            'matKhau' => 'required',
        ]);
        $admin = QuanTriViens::where(['SDT'=>$request->SDT,'matKhau'=>sha1($request->matKhau)])->count();
        if($admin>0){
            $adminData=QuanTriViens::where(['SDT'=>$request->SDT,'matKhau'=>$request->matKhau])->get();
            session(['adminData'=>$adminData]);

            if($request->has('rememberme')){
                Cookie::queue('adminSDT',$request->SDT,43200);
                Cookie::queue('adminmatKhau',$request->matKhau,43200);
            }
            return redirect('admin');
        }else{
            return redirect('admin/login')->with('msg','Nhập tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại!!');
        }
    }
    //Hàm logout
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    } 
    //Hàm dashboard
    function dashboard(){
        return view('dashboard');
    }
    
    //Hàm layout
    function layout($id){
        $data=QuanTriViens::find($id);
        return view('layout',['data'=>$data]);
    }
}

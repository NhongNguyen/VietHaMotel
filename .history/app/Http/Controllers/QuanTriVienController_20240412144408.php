<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\QuanTriViens;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;

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
        // Lấy thông tin của quản trị viên từ session
        $adminData = session('adminData');
    
        // Kiểm tra xem session có tồn tại không và có dữ liệu không
        if($adminData && count($adminData) > 0){
            // Lấy tên của quản trị viên từ dữ liệu session
            $tenQTV = $adminData[0]->tenQTV;
    
            // Truyền biến 'tenQTV' vào view 'dashboard'
            return view('dashboard', compact('tenQTV'));
        } else {
            // Nếu không có dữ liệu session, có thể chuyển hướng về trang đăng nhập hoặc xử lý theo logic của bạn
            return redirect('admin/login');
        }
    }
    
}

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
        if($admin > 0){
            $adminData = QuanTriViens::where(['SDT'=>$request->SDT,'matKhau'=>$request->matKhau])->first(); // Thay đổi ở đây
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
    
        // Kiểm tra xem có thông tin của quản trị viên không
        if($adminData) {
            // Lấy tên của quản trị viên
            $tenQTV = $adminData[0]->tenQTV;
    
            // Trả về view dashboard và truyền biến tenQTV vào view
            return view('dashboard', compact('tenQTV'));
        } else {
            // Nếu không có thông tin quản trị viên, chuyển hướng đến trang đăng nhập
            return redirect('admin/login')->with('msg', 'Bạn cần đăng nhập để truy cập trang quản trị');
        }
    }
}

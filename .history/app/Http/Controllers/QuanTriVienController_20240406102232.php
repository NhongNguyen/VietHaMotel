<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanTriVienController extends Controller
{
    //Hàm đăng nhập
    function login(){
        return view('login');
    }

    //Hàm kiểm tra tài khoản mật khẩu đăng nhập 
    function kiem_tra_dang_nhap(Request $request){
        $request->validate([
            'tenQTV' => 'required',
            'matKhau' => 'required',
        ]);
        $qtv = QuanTriViens::where(['username'=>$request->username,'password'=>sha1($request->password)])->count();
        if($qtv>0){
            $admin
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiPhongs;
use App\Models\DichVus;
use App\Models\PhongTros;
use App\Models\KhachThues;
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
        $phongId = $request->input('phong_id');

        $data = PhongTros::findOrFail($phongId);
        $khachthue = session('khachthuelogin');
        $khachthueId = null;
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if(session()->has('khachthuelogin')){
            $khachthueId = $khachthue['id'];  
            // Nếu đã đăng nhập, hiển thị form chọn thành viên
            return view('member', ['phong_id' => $phongId, 'data' => $data, 'khachthue' => $khachthueId]);
        } else {
            // Nếu chưa đăng nhập, chuyển hướng người dùng đến trang đăng nhập
            return view('frontlogin');
        }
    }
   // Home Page
function myroom(){
    $dichvus = DichVus::all();
    $loaiphongs = LoaiPhongs::all();
    $phongtros = PhongTros::all();
    
    // Lấy thông tin khách hàng từ session
    $khachthue = session('khachthuelogin');

    // Kiểm tra xem có thông tin khách hàng trong session không
    if($khachthue) {
        // Nếu có, lấy thông tin của khách thuê
        $khachthueId = $khachthue['id'];
        $khachthueName = $khachthue['tenKhach'];
    } else {
        // Nếu không, gán giá trị mặc định cho biến
        $khachthueId = null;
        $khachthueName = null;
    }
    
    return view('myroom', [
        'loaiphongs' => $loaiphongs,
        'dichvus' => $dichvus,
        'phongtros' => $phongtros,
        'khachthueId' => $khachthueId,
        'khachthueName' => $khachthueName
    ]);
}

}

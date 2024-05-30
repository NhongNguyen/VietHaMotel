<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiPhongs;
use App\Models\DichVus;
use App\Models\PhongTros;
use App\Models\KhachThues;
use App\Models\NoiQuys;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Home Page
    public function home(){
        $dichvus = DichVus::all();
        $loaiphongs = LoaiPhongs::all();
        $phongtros = PhongTros::all();
        $countPhongTros = $this->countPhongTros(); // Số lượng phòng trọ
        return view('home', ['loaiphongs' => $loaiphongs, 'dichvus' => $dichvus, 'phongtros' => $phongtros, 'countPhongTros' => $countPhongTros]);
    }
    
    // Đếm số lượng phòng trọ
    public function countPhongTros() {
        return PhongTros::count();
    }
    
    public function dangKiPhong(Request $request) {
        $phongId = $request->input('phong_id');
        $khachthue = session('khachthuelogin');
        $data = PhongTros::findOrFail($phongId);
    
        if (session()->has('khachthuelogin')) {
            // Ensure $khachthue is an array before accessing its elements
            if (is_array($khachthue) && array_key_exists('id', $khachthue)) {
                $idKhachThue = $khachthue['id'];
            } else {
                $idKhachThue = null; // Handle the case where $khachthue is not an array or 'id' does not exist
            }
            return view('member', ['phong_id' => $phongId, 'data' => $data, 'idKhachThue' => $idKhachThue]);
        } else {
            return view('frontlogin');
        }
    }
    
    

    public function myroom() {
        // Kiểm tra xem người dùng đã đăng nhập và có thông tin về phòng trọ hay không
        if (session()->has('khachthuelogin')) {
            // Lấy id của khách thuê đang đăng nhập
            $idKhachThue = session('khachthuelogin')->id;
            
            // Tìm thông tin phòng trọ của khách thuê dựa trên idKhachThue
            $phongTro = PhongTros::where('id_khach_thue', $idKhachThue)->first();
            $hopDong = HopDongs::where()
            
            // Kiểm tra xem có thông tin phòng trọ cho khách thuê này hay không
            if ($phongTro) {
                // Nếu có, trả về view với thông tin phòng trọ
                return view('myroom', ['phongTro' => $phongTro]);
            } else {
                // Nếu không có thông tin phòng trọ, có thể hiển thị thông báo hoặc chuyển hướng người dùng đến trang khác
                return redirect()->route('login')->with('error', 'Không tìm thấy thông tin phòng của bạn.');
            }
        } else {
            // Nếu người dùng chưa đăng nhập, chuyển hướng họ đến trang đăng nhập
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem phòng của mình.');
        }
    }

    // Home Page
    public function aboutus() {
        return view('about-us');
    }
     // Home Page
     public function rules() {
        $noiQuys = NoiQuys::all();
        return view('rules', ['noiQuys' => $noiQuys]);
    }
     // Home Page
     public function services() {
        $dichVus = dichVus::all();
        return view('services', ['dichVus' => $dichVus]);
    }
}

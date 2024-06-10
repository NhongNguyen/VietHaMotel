<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiPhongs;
use App\Models\DichVus;
use App\Models\PhongTros;
use App\Models\HopDongs;
use App\Models\HoaDons;
use App\Models\KhachThues;
use App\Models\ChiTietHoaDons;
use App\Models\NoiQuys;
use App\Models\ThanhViens;


use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Home Page
    public function home(Request $request){
        // if($request->session()->has('khachthuelogin')) {
        //     return view('error'); // Redirect logged-in users to their profile or dashboard
        // }

        // If user is not logged in, proceed to render the home page
        $dichvus = DichVus::all();
        $loaiphongs = LoaiPhongs::all();
        $phongtros = PhongTros::with('loaiphongs')->get()->groupBy(function($item) {
            return $item->loaiphongs ? $item->loaiphongs->tenLoaiPhong : 'Khác';
        });
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
            if (is_array($khachthue) && array_key_exists('id', $khachthue)) {
                $idKhachThue = $khachthue['id'];
            } else {
                $idKhachThue = null; 
            }
            return view('member', ['phong_id' => $phongId, 'data' => $data, 'idKhachThue' => $idKhachThue]);
        } else {
            return view('myroom');
        }
    }
    
    public function myroom() {
        if (session()->has('khachthuelogin')) {
            $idKhachThue = session('khachthuelogin')->id;
            $khachThue = KhachThues::where('id', $idKhachThue)->first();
            $phongTro = PhongTros::where('id_khach_thue', $idKhachThue)->first();
            if ($phongTro) {
                $idPhongTro = $phongTro->id;
            
                $hopDong = HopDongs::where('id_phong_tro', $idPhongTro)->first();
                $thanhVien = ThanhViens::find($phongTro->id_thanh_vien);                
                $hoaDon = HoaDons::where('id_phong_tro', $idPhongTro)->first();
                
                if ($hoaDon) {
                    $chiTietHoaDon = ChiTietHoaDons::where('id_hoa_don', $hoaDon->id)->get(); // Sử dụng get() để lấy danh sách các chi tiết hóa đơn
                } else {
                    $chiTietHoaDon = collect();
                }
                return view('myroom', ['phongTro' => $phongTro, 'hopDong' => $hopDong, 'hoaDon' => $hoaDon, 'chiTietHoaDon' => $chiTietHoaDon,'khachThue' => $khachThue,'thanhVien' => $thanhVien]);
            } else {
                return view('myroom', ['phongTro' => $phongTro,'khachThue' => $khachThue]);
            }
        } else {
            return view('myroom')->with(['showContent' => false, 'error' => 'Bạn cần đăng nhập để xem phòng của mình.']);
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
    public function getAvailableRooms() {
        $availableRooms = PhongTros::with('loaiphongs')->where('tinhTrang', 'Còn trống')->get();
        return response()->json($availableRooms);
    }

}

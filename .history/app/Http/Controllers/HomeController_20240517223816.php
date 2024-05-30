<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiPhongs;
use App\Models\DichVus;
use App\Models\PhongTros;
use App\Models\HopDongs;
use App\Models\HoaDons;
use App\Models\ChiTietHoaDons;
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
            $phongTro = s::where('id_khach_thue', $idKhachThue)->first();
            // Tìm thông tin phòng trọ của khách thuê dựa trên idKhachThue
            $phongTro = PhongTros::where('id_khach_thue', $idKhachThue)->first();
            
            // Kiểm tra xem có thông tin phòng trọ cho khách thuê này hay không
            if ($phongTro) {
                // Lấy id phòng trọ
                $idPhongTro = $phongTro->id;
                
                // Tìm thông tin hợp đồng dựa trên id phòng trọ
                $hopDong = HopDongs::where('id_phong_tro', $idPhongTro)->first();
                
                // Tìm thông tin hóa đơn dựa trên id phòng trọ
                $hoaDon = HoaDons::where('id_phong_tro', $idPhongTro)->first();
                
                // Nếu có hóa đơn, lấy thông tin chi tiết hóa đơn
                if ($hoaDon) {
                    $chiTietHoaDon = ChiTietHoaDons::where('id_hoa_don', $hoaDon->id)->get(); // Sử dụng get() để lấy danh sách các chi tiết hóa đơn
                } else {
                    $chiTietHoaDon = collect(); // Tạo một tập hợp rỗng nếu không có hóa đơn
                }
                
                // Nếu có, trả về view với thông tin phòng trọ, hợp đồng, hóa đơn và chi tiết hóa đơn
                return view('myroom', ['phongTro' => $phongTro, 'hopDong' => $hopDong, 'hoaDon' => $hoaDon, 'chiTietHoaDon' => $chiTietHoaDon]);
            } else {
                // Nếu không có thông tin phòng trọ, có thể hiển thị thông báo hoặc chuyển hướng người dùng đến trang khác
                return view('myroom')->with(['showContent' => false, 'error' => 'Không tìm thấy thông tin phòng của bạn.']);
            }
        } else {
            // Nếu người dùng chưa đăng nhập, chuyển hướng họ đến trang đăng nhập
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
}

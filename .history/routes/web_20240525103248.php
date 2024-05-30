<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuanTriVienController;
use App\Http\Controllers\PhongTroController;
use App\Http\Controllers\LoaiPhongController;
use App\Http\Controllers\NoiQuyController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\KhachThueController;
use App\Http\Controllers\ThanhVienController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\HopDongController;
use App\Http\Controllers\ChiTietHoaDonController;
use App\Http\Controllers\ChiTietHoaDonDichVuController;
use App\Http\Controllers\HinhAnhPhongTroController;
use App\Http\Controllers\HomeController;
use App\Models\ThanhViens;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'home']);
Route::match(['get', 'post'], '/dangkiphong', [HomeController::class, 'dangKiPhong'])->name('dang_ki_phong');
Route::get('member', [HomeController::class, 'myroom']);
Route::get('myroom', [HomeController::class, 'myroom']);
Route::get('about-us', [HomeController::class, 'aboutus']);
Route::get('/rules', [HomeController::class, 'rules']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/con-phong', [HomeController::class, 'getAvailableRooms']);
<div class="room-type-title" data-id="{{ $loaiPhong->id }}">{{ $loaiPhong->tenLoaiPhong }}</div>



// Admin Login
Route::get('admin/login',[QuanTriVienController::class,'dang_nhap']);
Route::post('admin/login',[QuanTriVienController::class,'kiemtra_dangnhap']);
Route::get('admin/logout',[QuanTriVienController::class,'logout']);
Route::get('admin/quantrivien/{id}/delete',[QuanTriVienController::class,'destroy']);
Route::resource('admin/quantrivien',QuanTriVienController::class);

// Admin dashboard
Route::get('admin',[QuanTriVienController::class,'dashboard']);

// phòng trọ
Route::get('admin/phongtros/{id}/delete',[PhongTroController::class,'destroy']);
Route::resource('admin/phongtros',PhongTroController::class);

//Loại phòng
Route::get('admin/loaiphong/{id}/delete',[LoaiPhongController::class,'destroy']);
Route::resource('admin/loaiphong',LoaiPhongController::class);

//Nội Quy
Route::get('admin/noiquy/{id}/delete',[NoiQuyController::class,'destroy']);
Route::resource('admin/noiquy',NoiQuyController::class);

//Dịch vụ
Route::get('admin/dichvu/{id}/delete',[DichVuController::class,'destroy']);
Route::resource('admin/dichvu',DichVuController::class);

//Khách thuê
Route::get('admin/khachthue/{id}/delete',[KhachThueController::class,'destroy']);
Route::resource('admin/khachthue',KhachThueController::class);


Route::get('login',[KhachThueController::class,'login']);
Route::post('khachthue/login',[KhachThueController::class,'khachthue_login']);
Route::get('register',[KhachThueController::class,'register']);
Route::get('logout',[KhachThueController::class,'logout']);
Route::get('changepassword', [KhachThueController::class, 'changepassword']);


//Thành viên
Route::get('admin/thanhvien/{id}/delete',[ThanhVienController::class,'destroy']);
Route::resource('admin/thanhvien',ThanhVienController::class);

//Hóa đơn
Route::get('admin/hoadon/{id}/delete',[HoaDonController::class,'destroy']);
Route::resource('admin/hoadon',HoaDonController::class);
Route::get('admin/hoadon/{id}/cthd-pdf', [HoaDonController::class, 'downloadCTHDPDF'])->name('hoadon.cthd-pdf');
Route::get('admin/hoadon/{id}/view-cthd-pdf', [HoaDonController::class, 'viewCTHDPDF'])->name('hoadon.view-cthd-pdf');
Route::get('admin/hoadon/{id}/create-chi-tiet-hoa-don', [HoaDonController::class, 'createChiTietHoaDon'])->name('createChiTietHoaDon');
Route::get('admin/hoadon/{id}/create-chi-tiet-hoa-don-dich-vu', [ChiTietHoaDonDichVuController::class, 'create'])->name('create-chi-tiet-hoa-don-dich-vu');

Route::get('admin/chitiethoadondichvu/{id}/view', [ChiTietHoaDonDichVuController::class, 'view'])->name('chitiethoadondichvu.view');



//Hợp đồng
Route::get('admin/hopdong/{id}/delete',[HopDongController::class,'destroy']);
Route::resource('admin/hopdong',HopDongController::class);
Route::get('admin/hopdong/{id}/pdf', [HopDongController::class, 'downloadPDF'])->name('hopdong.pdf');
Route::get('admin/hopdong/{id}/view-pdf', [HopDongController::class, 'viewPDF'])->name('hopdong.view-pdf');

//Chi tiết hóa đơn 
Route::get('admin/chitiethoadon/{id}/delete',[ChiTietHoaDonController::class,'destroy']);
Route::resource('admin/chitiethoadon',ChiTietHoaDonController::class);

//Chi tiết hóa đơn dịch vụ
Route::get('admin/chitiethoadondichvu/{id}/delete',[ChiTietHoaDonDichVuController::class,'destroy']);
Route::resource('admin/chitiethoadondichvu',ChiTietHoaDonDichVuController::class);

//Hình ảnh phòng trọ
Route::get('admin/hinhanhphongtro/{id}/delete',[HinhAnhPhongTroController::class,'destroy']);
Route::resource('admin/hinhanhphongtro',HinhAnhPhongTroController::class);

Route::post('/dangkiphong', [HomeController::class, 'dangKiPhong'])->name('dang_ki_phong');

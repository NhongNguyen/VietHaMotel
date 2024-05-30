<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiTietHoaDonDichVus;
use App\Models\ChiTietHoaDons;
use App\Models\DichVus;
use App\Models\HoaDons;
use App\Models\PhongTros;


class ChiTietHoaDonDichVuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = ChiTietHoaDonDichVus::all();
        $chitiethoadons = ChiTietHoaDons::all();
        $dichvus = DichVus::all();
        $hoadons = HoaDons::all();
        $phongtros = PhongTros::all();

        return view('chitiethoadondichvu.index',['data'=>$data,'chitiethoadons'=>$chitiethoadons,'dichvus'=>$dichvus,'hoadons'=>$hoadons,'phongtros'=>$phongtros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $chitiethoadons = ChiTietHoaDons::all();
        $dichvus = DichVus::all();
        $hoadons = HoaDons::all();
        $phongtros = PhongTros::all();
        return view('chitiethoadondichvu.create',['chitiethoadons'=>$chitiethoadons,'dichvus'=>$dichvus,'hoadons'=>$hoadons,'phongtros'=>$phongtros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_chi_tiet_hoa_don' => 'required|integer',
            'id_dich_vu' => 'required|array',
            'soTruoc' => 'required|array',
            'soHienTai' => 'required|array',
        ]);

        $id_chi_tiet_hoa_don = $request->id_chi_tiet_hoa_don;
        
        // Kiểm tra nếu id_chi_tiet_hoa_don bằng 0 thì quay lại trang trước
        if ($id_chi_tiet_hoa_don == 0) {
            return redirect()->back()->with('error', 'Vui lòng chọn chi tiết hóa đơn.');
        }


        $id_dich_vus = $request->id_dich_vu;
        $soTruoc = $request->soTruoc;
        $soHienTai = $request->soHienTai;

        // Lặp qua mảng các id_dich_vu đã được chọn và thêm chúng vào bảng chi_tiet_hoa_don_dich_vuses
        foreach ($id_dich_vus as $key => $id_dich_vu) {
            $chiTietHoaDonDichVu = new ChiTietHoaDonDichVus;
            $chiTietHoaDonDichVu->id_chi_tiet_hoa_don = $id_chi_tiet_hoa_don;
            if ($id_chi_tiet_hoa_don == 0) {
                return redirect()->back()->with('error', 'Vui lòng chọn chi tiết hóa đơn.');
            }
            $chiTietHoaDonDichVu->id_dich_vu = $id_dich_vu;
            $chiTietHoaDonDichVu->soTruoc = $soTruoc[$key];
            $chiTietHoaDonDichVu->soHienTai = $soHienTai[$key];
            
            // Kiểm tra nếu cả hai giá trị "Số Trước" và "Số Hiện Tại" đều bằng 0
            if ($soTruoc[$key] == 0 && $soHienTai[$key] == 0) {
                $giaDichVu = DichVus::findOrFail($id_dich_vu)->giaDichVu; // Lấy giá dịch vụ từ bảng DichVus
                $chiTietHoaDonDichVu->thanhTien = $giaDichVu;
            } else {
                $giaDichVu = DichVus::findOrFail($id_dich_vu)->giaDichVu; // Lấy giá dịch vụ từ bảng DichVus
                $chiTietHoaDonDichVu->thanhTien = $giaDichVu + ($soHienTai[$key] - $soTruoc[$key]);
            }
            $tongTien = $chiTietHoaDonDichVu->thanhTien
            $chiTietHoaDonDichVu->save();
        }

        return redirect()->back()->with('success', 'Dịch vụ đã được thêm vào chi tiết hóa đơn.');
    }
}

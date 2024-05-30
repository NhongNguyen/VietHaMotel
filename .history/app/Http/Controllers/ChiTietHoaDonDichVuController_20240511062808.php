<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiTietHoaDonDichVus;
use App\Models\ChiTietHoaDons;
use App\Models\DichVus;
use App\Models\HoaDons;
use App\Models\PhongTros;
use Illuminate\Support\Facades\DB; // Thêm namespace này

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

        // Tính tổng tiền cho mỗi id_chi_tiet_hoa_don và ngày lập chi tiết hóa đơn
        $totalAmounts = [];
        foreach ($data as $item) {
            $id_chi_tiet_hoa_don = $item->id_chi_tiet_hoa_don;
            $ngayLapChiTietHoaDon = $item->ngayLapChiTietHoaDon;

            // Kiểm tra nếu chưa có khóa tổng tiền cho id_chi_tiet_hoa_don và ngày lập chi tiết hóa đơn
            if (!isset($totalAmounts[$id_chi_tiet_hoa_don][$ngayLapChiTietHoaDon])) {
                $totalAmounts[$id_chi_tiet_hoa_don][$ngayLapChiTietHoaDon] = 0;
            }

            // Tính tổng tiền cho từng id_chi_tiet_hoa_don và ngày lập chi tiết hóa đơn
            $totalAmounts[$id_chi_tiet_hoa_don][$ngayLapChiTietHoaDon] += $item->thanhTien;
        }

        return view('chitiethoadondichvu.index', ['data' => $data, 'chitiethoadons' => $chitiethoadons, 'dichvus' => $dichvus, 'hoadons' => $hoadons, 'phongtros' => $phongtros, 'totalAmounts' => $totalAmounts]);
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
    return view('chitiethoadondichvu.create', ['chitiethoadons' => $chitiethoadons, 'dichvus' => $dichvus, 'hoadons' => $hoadons, 'phongtros' => $phongtros]);
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
        'id_chi_tiet_hoa_don' => 'integer',
        'id_dich_vu' => 'nullable|array',
        'soTruoc' => 'nullable|array',
        'soHienTai' => 'nullable|array',
    ]);

    $id_chi_tiet_hoa_don = $request->id_chi_tiet_hoa_don;
    $id_dich_vus = $request->id_dich_vu;
    $soTruoc = $request->soTruoc;
    $soHienTai = $request->soHienTai;

    // Lấy ngày lập chi tiết hóa đơn từ chitiethoadon tương ứng
    $chitiethoadon = ChiTietHoaDons::findOrFail($id_chi_tiet_hoa_don);
    $ngayLapChiTietHoaDon = $chitiethoadon->ngayLapHoaDon;

    // Tính tổng tiền cho mỗi id_chi_tiet_hoa_don và ngày lập chi tiết hóa đơn
    $totalAmount = 0;
    foreach ($id_dich_vus as $key => $id_dich_vu) {
        // Kiểm tra xem checkbox có được chọn hay không
        if (in_array($id_dich_vu, $request->input('id_dich_vu', []))) {
            $giaDichVu = DichVus::findOrFail($id_dich_vu)->giaDichVu; // Lấy giá dịch vụ từ bảng DichVus

            // Kiểm tra nếu cả hai giá trị "Số Trước" và "Số Hiện Tại" đều bằng 0
            if ($soTruoc[$key] == 0 && $soHienTai[$key] == 0) {
                $totalAmount += $giaDichVu;
            } else {
                $totalAmount += $giaDichVu + ($soHienTai[$key] - $soTruoc[$key]);
            }
        }
    }

    // Cập nhật tổng tiền vào chi tiết hóa đơn
    $chitiethoadon->update(['thanhTien' => $chitiethoadon->thanhTien + $totalAmount]);

    // Tạo mới bản ghi cho ChiTietHoaDonDichVus
    $chitiethoadondichvu = new ChiTietHoaDonDichVus();
    $chitiethoadondichvu->id_chi_tiet_hoa_don = $id_chi_tiet_hoa_don;
    // Gán các giá trị còn lại tương ứng từ request
    $chitiethoadondichvu->save();

    return redirect()->back()->with('success', 'Dịch vụ đã được thêm vào chi tiết hóa đơn.');
}

}

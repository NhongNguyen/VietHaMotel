<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\HoaDons;
use App\Models\ChiTietHoaDons;
use App\Models\ChiTietHoaDonDichVus;
use App\Models\PhongTros;
use App\Models\HopDongs;
use App\Models\DichVus;
use App\Models\LoaiPhongs;
use App\Models\KhachThues;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lấy danh sách tất cả hóa đơn cùng với thông tin phòng trọ và hợp đồng tương ứng
        $data = HoaDons::with(['phongtros', 'hopdongs'])->get();
    
        // Lấy danh sách tất cả phòng trọ và hợp đồng để hiển thị trên view
        $phongtros = PhongTros::all();
        $hopdongs = HopDongs::all();       
        $dichvus= DichVus::all(); 
    
        // Trả về view và chuyển dữ liệu các hóa đơn, phòng trọ, và hợp đồng vào view
        return view('hoadon.index', ['data' => $data, 'phongtros' => $phongtros, 'hopdongs' => $hopdongs,'dichvus'=>$dichvus]);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Lấy hóa đơn dựa trên id
        $hoaDon = HoaDons::findOrFail($id);
        // Lấy danh sách chi tiết hóa đơn cho hóa đơn được chỉ định
        $chiTietHoaDons = ChiTietHoaDons::where('id_hoa_don', $id)->get();
        
        // Tính toán tiền số ngày thuê
        $ngayBatDauHopDong = $hoaDon->hopdongs->ngayBatDau;
        $ngayHienTai = Carbon::now();
        $soNgayThue = $ngayHienTai->diffInDays($ngayBatDauHopDong);
        $giaDatCoc = $hoaDon->hopdongs->giaDatCoc;
        $tienSoNgayThue = $soNgayThue * ($giaDatCoc/30);
    
        // Trả về view và chuyển dữ liệu chi tiết hóa đơn vào view
        return view('hoadon.show', compact('hoaDon', 'chiTietHoaDons','tienSoNgayThue'));
    }
/**
     * Hiển thị chi tiết hóa đơn dưới dạng PDF.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewCTHDPDF($id)
    {

        // Tìm kiếm chi tiết hóa đơn dựa trên ID
        $chiTietHoaDon = ChiTietHoaDons::findOrFail($id);
        $idhoadon = $chiTietHoaDon->id_hoa_don;
        $hoaDon = HoaDons::findOrFail($idhoadon);
        $phongTro = PhongTros::findOrFail($hoaDon->id_phong_tro);
        $loaiPhong = LoaiPhongs::findOrFail($phongTro->id_loai_phong);
        $khachThue = KhachThues:: findOrFail($phongTro->id_khach_thue);

          // Tính toán tiền số ngày thuê
          $ngayBatDauHopDong = $hoaDon->hopdongs->ngayBatDau;
          $ngayHienTai = Carbon::now();
          $soNgayThue = $ngayHienTai->diffInDays($ngayBatDauHopDong);
          $giaDatCoc = $hoaDon->hopdongs->giaDatCoc;
          $tienSoNgayThue = $soNgayThue * ($giaDatCoc/30);

          $chiTietHoaDonDichVus = ChiTietHoaDonDichVus::where('id_chi_tiet_hoa_don', $id)->get();

          $totalAmounts = [];
              foreach ($chiTietHoaDonDichVus as $item) {
                  $id_chi_tiet_hoa_don = $item->id_chi_tiet_hoa_don;
                  $ngayLapChiTietHoaDon = $item->ngayLapChiTietHoaDon;
      
                  // Kiểm tra nếu chưa có khóa tổng tiền cho id_chi_tiet_hoa_don và ngày lập chi tiết hóa đơn
                  if (!isset($totalAmounts[$id_chi_tiet_hoa_don][$ngayLapChiTietHoaDon])) {
                      $totalAmounts[$id_chi_tiet_hoa_don][$ngayLapChiTietHoaDon] = 0;
                  }
      
                  // Tính tổng tiền cho từng id_chi_tiet_hoa_don và ngày lập chi tiết hóa đơn
                  $totalAmounts[$id_chi_tiet_hoa_don][$ngayLapChiTietHoaDon] += $item->thanhTien;
              }

        // Tạo một view PDF sử dụng dữ liệu từ chi tiết hóa đơn
        $view = View::make('cthddownload', compact('chiTietHoaDon','hoaDon','phongTro','loaiPhong','khachThue','tienSoNgayThue','chiTietHoaDonDichVus','totalAmounts'));

        // Tạo một đối tượng Dompdf
        $dompdf = new Dompdf();

        // Tải nội dung HTML của view vào Dompdf
        $dompdf->loadHtml($view->render());

        // Thiết lập kích thước giấy tùy chỉnh (ví dụ: 210mm x 297mm) và hướng đứng
        $dompdf->setPaper([0, 0, 210, 350], 'portrait');

        // Render PDF
        $dompdf->render();

        // Lấy nội dung PDF
        $pdfContent = $dompdf->output();

        // Trả về nội dung PDF dưới dạng response
        return response($pdfContent)
            ->header('Content-Type', 'application/pdf');
    }

    /**
     * Tải xuống chi tiết hóa đơn dưới dạng PDF.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadCTHDPDF($id)
    {
        // Tìm kiếm chi tiết hóa đơn dựa trên ID
        $chiTietHoaDon = ChiTietHoaDons::findOrFail($id);

        // Tạo một view PDF sử dụng dữ liệu từ chi tiết hóa đơn
        $view = View::make('cthddownload', compact('chiTietHoaDon'));

        // Tạo một đối tượng Dompdf
        $dompdf = new Dompdf();

        // Tải nội dung HTML của view vào Dompdf
        $dompdf->loadHtml($view->render());

        // Thiết lập kích thước giấy tùy chỉnh (ví dụ: 210mm x 297mm) và hướng đứng
        $dompdf->setPaper([0, 0, 210, 297], 'portrait');

        // Render PDF
        $dompdf->render();

        // Tên file PDF sẽ được tạo
        $filename = "ChiTietHoaDon_" . $chiTietHoaDon->id . ".pdf";

        // Tải xuống PDF với tên file đã chỉ định
        return $dompdf->stream($filename);
    }
    public function createChiTietHoaDon($hoaDonId)
{
    // Lấy thông tin hóa đơn dựa trên id
    $hoaDon = HoaDons::findOrFail($hoaDonId);
    
    // Kiểm tra xem hóa đơn có hợp đồng không
    if ($hoaDon->hopdongs) {
        // Lấy ngày cuối của tháng hiện tại
        $lastDayOfMonth = now()->endOfMonth();

        // Kiểm tra xem ngày hiện tại có phải là ngày cuối của tháng không
        if (now()->isSameDay($lastDayOfMonth)) {
            // Tạo một chi tiết hóa đơn mới
            $chiTietHoaDon = new ChiTietHoaDons;
            
            // Tính toán số ngày thuê
            $ngayBatDauHopDong = $hoaDon->hopdongs->ngayBatDau;
            $ngayHienTai = Carbon::now();
            $soNgayThue = $ngayHienTai->diffInDays($ngayBatDauHopDong);

            // Lấy thông tin giá đặt cọc từ hợp đồng
            $giaDatCoc = $hoaDon->hopdongs->giaDatCoc;

            // Tính toán thành tiền
            $thanhTien = $soNgayThue * ($giaDatCoc/30);

            // Gán các giá trị cho chi tiết hóa đơn
            $chiTietHoaDon->id_hoa_don = $hoaDon->id;
            $chiTietHoaDon->soNgayThue = $soNgayThue;
            $chiTietHoaDon->daThanhToan = 'Chưa';
            $chiTietHoaDon->ngayLapHoaDon = $ngayHienTai;
            $chiTietHoaDon->thanhTien = $thanhTien;

            // Lưu chi tiết hóa đơn vào cơ sở dữ liệu
            $chiTietHoaDon->save();

            // Cập nhật tổng tiền của hóa đơn
            $hoaDon->tongTien += $thanhTien;
            $hoaDon->save();

            // Chuyển hướng đến trang tạo chi tiết hóa đơn dịch vụ và truyền id của chi tiết hóa đơn mới tạo
            return redirect()->route('create-chi-tiet-hoa-don-dich-vu', $chiTietHoaDon->id);
        } else {
            // Nếu không phải là ngày cuối của tháng, chuyển hướng trở lại trang danh sách hóa đơn
            return redirect()->route('hoadon.index')->with('error', 'Không thể tạo chi tiết hóa đơn. Hôm nay không phải là ngày cuối của tháng.');
        }
    }
}

}

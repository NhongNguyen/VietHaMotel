<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\HoaDons;
use App\Models\ChiTietHoaDons;
use App\Models\PhongTros;
use App\Models\HopDongs;
use App\Models\DichVus;
use App\Models\ChiTietHoaDonDichVus;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
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
    
        // Trả về view và chuyển dữ liệu chi tiết hóa đơn vào view
        return view('hoadon.show', compact('hoaDon', 'chiTietHoaDons'));
    }
 /**
 * Tạo chi tiết hóa đơn cho tất cả hóa đơn.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function autoCreateChiTietForAll(Request $request)
{
    // Lấy danh sách các dịch vụ được chọn từ request
    $selectedServices = $request->input('id_dich_vu');

    // Lấy danh sách tất cả các hóa đơn
    $hoaDons = HoaDons::all();

    // Lặp qua từng hóa đơn và tạo chi tiết hóa đơn
    foreach ($hoaDons as $hoaDon) {
        // Kiểm tra xem hóa đơn có hợp đồng không
        if ($hoaDon->hopdongs) {
            // Tạo một chi tiết hóa đơn mới
            $chiTietHoaDon = new ChiTietHoaDons;

            // Tính toán số ngày thuê
            $ngayBatDauHopDong = $hoaDon->hopdongs->ngayBatDau;
            $ngayHienTai = Carbon::now();
            $soNgayThue = $ngayHienTai->diffInDays($ngayBatDauHopDong);

            // Kiểm tra số ngày thuê có nằm trong tháng trước không
            $ngayThangTruoc = Carbon::now()->subMonth()->endOfMonth();
            if ($ngayHienTai->lt($ngayThangTruoc)) {
                // Nếu số ngày thuê không nằm trong tháng trước, sử dụng ngày cuối cùng của tháng trước
                $ngayLapHoaDon = $ngayThangTruoc;
            } else {
                // Nếu số ngày thuê nằm trong tháng trước, sử dụng ngày hiện tại
                $ngayLapHoaDon = $ngayHienTai;
            }

            // Lấy thông tin giá đặt cọc từ hợp đồng
            $giaDatCoc = $hoaDon->hopdongs->giaDatCoc;

            // Tính toán thành tiền
            $thanhTien = $soNgayThue * ($giaDatCoc/30);

            // Gán các giá trị cho chi tiết hóa đơn
            $chiTietHoaDon->id_hoa_don = $hoaDon->id;
            $chiTietHoaDon->soNgayThue = $soNgayThue;
            $chiTietHoaDon->daThanhToan = 'Chưa'; // Sửa giá trị thành 'Chưa thanh toán'
            $chiTietHoaDon->ngayLapHoaDon = $ngayHienTai;
            $chiTietHoaDon->thanhTien = $thanhTien;

            // Lưu chi tiết hóa đơn vào cơ sở dữ liệu
            $chiTietHoaDon->save();

            // Cập nhật tổng tiền của hóa đơn
            $hoaDon->tongTien += $thanhTien;
            $hoaDon->save();
        }
    }

    // Chuyển hướng người dùng về trang danh sách hóa đơn sau khi hoàn thành
    return redirect('admin/hoadon')->with('success', 'Tất cả chi tiết hóa đơn đã được tạo tự động.');
}
/**
     * Hiển thị chi tiết hóa đơn dưới dạng PDF.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewPDF($id)
    {
        // Tìm kiếm chi tiết hóa đơn dựa trên ID
        $chiTietHoaDon = ChiTietHoaDons::findOrFail($id);

        // Tạo một view PDF sử dụng dữ liệu từ chi tiết hóa đơn
        $view = View::make('cthd', compact('chiTietHoaDon'));

        // Tạo một đối tượng Dompdf
        $dompdf = new Dompdf();

        // Tải nội dung HTML của view vào Dompdf
        $dompdf->loadHtml($view->render());

        // Thiết lập kích thước giấy tùy chỉnh (ví dụ: 210mm x 297mm) và hướng đứng
        $dompdf->setPaper([0, 0, 210, 297], 'portrait');

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
    public function downloadPDF($id)
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
}

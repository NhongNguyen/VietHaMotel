<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\HoaDons;
use App\Models\ChiTietHoaDons;
use App\Models\ChiTietHoaDonDichVus;
use App\Models\PhongTros;
use App\Models\HopDongs;
use App\Models\DichVus;
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
    
        // Trả về view và chuyển dữ liệu chi tiết hóa đơn vào view
        return view('hoadon.show', compact('hoaDon', 'chiTietHoaDons'));
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
        $khachThue = KhachThues:: findOrFail($phongTro->id_khach_thue);
        // Tạo một view PDF sử dụng dữ liệu từ chi tiết hóa đơn
        $view = View::make('cthddownload', compact('chiTietHoaDon','hoaDon','phongTro','khachThue'));

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
}

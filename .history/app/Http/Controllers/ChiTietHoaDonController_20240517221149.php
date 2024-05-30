<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiTietHoaDons;
use App\Models\HoaDons;
use App\Models\HopDongs;
use App\Models\PhongTros;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;


class ChiTietHoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = ChiTietHoaDons::all();
        $hoadons = HoaDons::all();
        $phongtros = PhongTros::all();
        return view('chitiethoadon.index',['data'=>$data,'hoadons'=>$hoadons,'phongtros'=>$phongtros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoadons = HoaDons::all();
        $hopdongs = HopDongs::all();

        return view('chitiethoadon.create', ['hoadons' => $hoadons, 'hopdongs' => $hopdongs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ngayBatDauHopDong = $request->hopdongs->ngayBatDau;
        $ngayKetThucHopDong = $request->hopdongs->ngayKetThuc;
    
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
    
        // Tạo chi tiết hóa đơn
        $data = new ChiTietHoaDons;
        $data->id_hoa_don = $request->hoadon_id;
        $data->soNgayThue = $soNgayThue;
        $data->daThanhToan = $request->daThanhToan;
        $data->ngayLapHoaDon = $ngayLapHoaDon;
        $data->thanhTien = $request->thanhTien;
        $data->save();
        
        return redirect('admin/chitiethoadon/create')->with('success','Dữ liệu đã được thêm vào.');
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        ChiTietHoaDons::where('id', $id)->delete();
        return redirect('admin/chitiethoadon/')->with('success','Dữ liệu đã được xóa.');
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
        $view = View::make('cthddowload', compact('chiTietHoaDon'));

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
    
}

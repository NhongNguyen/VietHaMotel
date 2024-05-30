<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use App\Models\HopDongs;
use App\Models\KhachThues;
use App\Models\PhongTros;
use App\Models\HoaDons;
use App\Models\ChiTietHoaDons;
use App\Models\ChiTietHoaDonDichVus;
use Illuminate\Support\Facades\View;

class HopDongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HopDongs::all();
        return view('hopdong.index', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = HopDongs::find($id);
        $data->id_phong_tro = $request->roo_id;
        $data->id_khach_thue = $request->cus_id;
        $data->giaDatCoc = $request->giaDatCoc;
        $data->ngayBatDau = $request->ngayBatDau;
        $data->ngayKetThuc = $request->ngayKetThuc;
        $data->save();

        return redirect('admin/hopdong/'.$id.'/edit')->with('success','Dữ liệu đã được cập nhật.');
    }

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $hopdong = HopDongs::findOrFail($id);
    $phongTroId = $hopdong->id_phong_tro;

    // Fetch all invoices related to the contract
    $hoaDons = HoaDons::where('id_hop_dong', $id)->get();
    
    foreach ($hoaDons as $hoaDon) {
        // Fetch all invoice details related to the invoice
        $chiTietHoaDons = ChiTietHoaDons::where('id_hoa_don', $hoaDon->id)->get();
        
        foreach ($chiTietHoaDons as $chiTietHoaDon) {
            // Fetch and delete all service details related to the invoice detail
            $chiTietHoaDonDichVus = ChiTietHoaDonDichVus::where('id_chi_tiet_hoa_don', $chiTietHoaDon->id)->get();
            foreach ($chiTietHoaDonDichVus as $chiTietHoaDonDichVu) {
                $chiTietHoaDonDichVu->delete();
            }
            // Delete the invoice detail
            $chiTietHoaDon->delete();
        }
        // Delete the invoice
        $hoaDon->delete();
    }

    // Update the room status
    $phongTro = PhongTros::findOrFail($phongTroId);
    $phongTro->update([
        'id_thanh_vien' => 0,
        'id_khach_thue' => 0,
        'tinhTrang' => 'Còn trống',
    ]);

    // Delete the contract
    $hopdong->delete();

    return redirect('admin/hopdong')->with('success', 'Dữ liệu đã được xóa.');
}




     /**
     * Display the specified resource as PDF.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF($id)
    {
        $hopdong = HopDongs::findOrFail($id);
        $khachthues = KhachThues::findOrFail($hopdong->id_khach_thue);
        $phongtros = PhongTros::findOrFail($hopdong->id_phong_tro);


        $view = View::make('download', compact('hopdong', 'khachthues', 'phongtros'));

        $dompdf = new Dompdf();

        
        $dompdf->loadHtml($view->render());

        
        $dompdf->setPaper('A4', 'portrait');

        
        $dompdf->render();

        $filename = "Hợp đồng- $phongtros->tenPhong- $khachthues->tenKhach $khachthues->hoKhach.pdf";

        return $dompdf->stream($filename);
    }

    /**
     * Display the specified resource as PDF.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewPDF($id)
    {
        $hopdong = HopDongs::findOrFail($id);
        $khachthues = KhachThues::findOrFail($hopdong->id_khach_thue);
        $phongtros = PhongTros::findOrFail($hopdong->id_phong_tro);

        $view = View::make('download', compact('hopdong', 'khachthues', 'phongtros'));

        $dompdf = new Dompdf();

        $dompdf->loadHtml($view->render());


        $dompdf->setPaper('A4', 'portrait');

        
        $dompdf->render();

        
        $pdfContent = $dompdf->output();

        
        return response($pdfContent)
            ->header('Content-Type', 'application/pdf');
    }
}  
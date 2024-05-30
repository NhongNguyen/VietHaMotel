<?php

namespace App\Http\Controllers;

use App\Models\HopDongs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\LoaiPhongs;
use App\Models\PhongTros;
use App\Models\KhachThues;
use App\Models\ThanhViens;
use App\Models\HinhAnhPhongTros;
use App\Models\HoaDons;


class PhongTroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PhongTros::all();
        $hinhAnhPhongTros = HinhAnhPhongTros::all();
        return view('phongtro.index', ['data' => $data,'hinhAnhPhongTros'=>$hinhAnhPhongTros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Lấy danh sách khách thuê chưa có phòng trọ
        $khachthues = KhachThues::all();
        
        $loaiphongs = LoaiPhongs::all();
        // Lấy danh sách thành viên chưa có phòng trọ
        $thanhviens = ThanhViens::all();
    
        return view('phongtro.create', ['loaiphongs' => $loaiphongs, 'khachthues' => $khachthues, 'thanhviens' => $thanhviens]);
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
            'tenPhong' => 'required',
            'tinhTrang' => 'required',
            'hinhAnhDaiDien' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Kiểm tra xem trường rt_id đã được chọn và không có giá trị bằng 0 hay không
        if ($request->rt_id == 0) {
            return redirect()->back()->with('error', 'Bạn phải chọn loại phòng trước khi thêm mới.');
        }

        if ($request->hasFile('hinhAnhDaiDien')) {
            $hinhAnhDaiDienPath = $request->file('hinhAnhDaiDien')->store('hinhanhdaidien', 'public');
        }

        $data = new PhongTros;
        $data->id_loai_phong = $request->rt_id;
        $data->id_khach_thue = $request->cus_id;
        $data->id_thanh_vien = $request->mem_id;
        $data->tenPhong = $request->tenPhong;
        $data->tinhTrang = $request->tinhTrang ? 'Còn trống' : 'Hết phòng';
        $data->hinhAnhDaiDien = $hinhAnhDaiDienPath;
        $data->moTa = $request->moTa;
        $data->save();

        return redirect('admin/phongtros/create')->with('success', 'Dữ liệu đã được thêm vào.');
    }
    /**

     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
      // Lấy danh sách khách thuê chưa có phòng trọ
      $khachthues = KhachThues::whereDoesntHave('phongtro')->get();
        
      $loaiphongs = LoaiPhongs::all();
      // Lấy danh sách thành viên chưa có phòng trọ
      $thanhviens = ThanhViens::whereDoesntHave('phongtro')->get();
        $data=PhongTros::find($id);
    return view('phongtro.edit',['data'=>$data,'loaiphongs'=>$loaiphongs,'khachthues'=>$khachthues,'thanhviens'=>$thanhviens]);
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
    $data = PhongTros::find($id);
    
    // Kiểm tra xem đã chọn thành viên và khách thuê chưa
    if ($request->mem_id != 0 && $request->cus_id == 0) {
        return redirect()->back()->with('error', 'Bạn phải chọn khách thuê khi chọn thành viên.');
    }

    // Xử lý cập nhật id_thanh_vien và số năm kết thúc hợp đồng
    if ($request->ref == 'firstregister') {
        // Không cần làm gì nếu là đăng ký đầu tiên (không có thành viên)
        $data->id_thanh_vien = null;
    } elseif ($request->ref == 'lastregister') {
        // Tạo mới thành viên
        $thanhVien = new ThanhViens;
        $thanhVien->hoThanhVien = $request->hoThanhVien;
        $thanhVien->tenThanhVien = $request->tenThanhVien;
        $thanhVien->CCCDtruoc = $request->CCCDtruoc;
        $thanhVien->CCCDsau = $request->CCCDsau;
        $thanhVien->save();
    
        // Cập nhật id_thanh_vien với thành viên mới tạo
        $data->id_thanh_vien = $thanhVien->id;
    }
    
    // Cập nhật các thông tin khác của phòng trọ
    $data->id_loai_phong = $request->rt_id;
    $data->id_khach_thue = $request->cus_id;
    $data->tenPhong = $request->tenPhong;
    $data->tinhTrang = $request->cus_id != 0 ? 'Hết phòng' : 'Còn Trống';
    $data->save();

    // Tính toán ngày kết thúc hợp đồng từ số năm được nhập
    $soNamKetThuc = $request->soNamKetThuc;
    $ngayBatDau = Carbon::parse($data->created_at);
    $ngayKetThuc = $ngayBatDau->addYears($soNamKetThuc);

    // Tạo hoặc cập nhật hợp đồng
    $hopDong = HopDongs::updateOrCreate(
        ['id_phong_tro' => $data->id, 'id_khach_thue' => $request->cus_id],
        [
            'id_loai_phong' => $data->id_loai_phong,
            'giaDatCoc' => $data->LoaiPhongs->donGia,
            'ngayBatDau' => $data->created_at,
            'ngayKetThuc' => $ngayKetThuc
        ]
    );

    // Kiểm tra xem đã chọn khách thuê chưa
    if ($request->cus_id != 0) {
        // Tạo hóa đơn
        $hoaDon = new HoaDons;
        $hoaDon->id_phong_tro = $data->id;
        $hoaDon->id_hop_dong = $hopDong->id; // Gán id_hop_dong cho hóa đơn mới
        $hoaDon->ngayXuat = Carbon::now();
        $hoaDon->tongTien = 0;
        $hoaDon->save();
    }
    
    if ($request->ref == "firstregister" || $request->ref == "lastregister") {
        return redirect('member')->with('success', 'Đã đăng kí tài khoản thành công.');
    }

    return redirect('admin/phongtros/'.$id.'/edit')->with('success', 'Dữ liệu đã được cập nhật.');
}

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Xóa bản hợp đồng liên quan
        HopDongs::where('id_phong_tro', $id)->delete();
        // Xóa hình ảnh phòng trọ liên quan
        HinhAnhPhongTros::where('id_phong_tro', $id)->delete();
        // Xóa phòng trọ
        PhongTros::where('id',$id)->delete();


    
        return redirect('admin/phongtros')->with('success','Dữ liệu đã được xóa.');
    }

    public function member(){
        return view('member');
    }
}

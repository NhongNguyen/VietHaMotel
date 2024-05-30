@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chi tiết phòng trọ 
                <a href="{{url('admin/phongtros')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            @if(Session::has('error'))
            <p class="text-danger">{{session('error')}}</p>
            @endif
            <div class="table-responsive">
                <form method="post" action="{{url('admin/phongtros/'.$data->id)}}">
                    @csrf
                    @method('put')
                    <table class="table table-bordered">
                        <tr>
                            <th>Chọn loại phòng</th>
                            <td>
                                <select name="rt_id" class="form-control">
                                    <option>--- Chọn ---</option>
                                    @foreach($loaiphongs as $rt)
                                    <option @if($data->id_loai_phong==$rt->id) selected @endif value="{{$rt->id}}">{{$rt->tenLoaiPhong}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Chọn khách thuê</th>
                            <td>
                                <select id="cus_id" name="cus_id" class="form-control" onchange="toggleSoNamKetThuc()">
                                    @if($data->khachthues)
                                    <option value="{{$data->id_khach_thue}}" selected>{{$data->khachthues->tenKhach}}-{{$data->khachthues->hoKhach}}</option>
                                    @else
                                    <option value="0">Tên-Họ</option>
                                    @foreach($khachthues as $cus)
                                    <option @if($data->id_khach_thue==$cus->id) selected @endif value="{{$cus->id}}">{{$cus->tenKhach}}-{{$cus->hoKhach}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Chọn thành viên</th>
                           <td>
                                <select name="mem_id" class="form-control">
                                    @if($data->thanhviens)
                                        <option value="{{$data->id_thanh_vien}}" selected>{{$data->thanhviens->tenThanhVien}}-{{$data->thanhviens->hoThanhVien}}</option>
                                    @else
                                        <option value="0">Tên-Họ</option>
                                        @foreach($thanhviens as $mem)
                                            <option @if($data->id_thanh_vien==$mem->id) selected @endif value="{{$mem->id}}">{{$mem->tenThanhVien}}-{{$mem->hoThanhVien}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Tên Phòng</th>
                            <td><input value="{{$data->tenPhong}}" name="tenPhong" type="text" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Số năm kết thúc hợp đồng</th>
                            <td><input id="soNamKetThuc" value="{{$data->soNamKetThuc}}" min="1" max="10"  name="soNamKetThuc" type="number" class="form-control" required/></td>
                        </tr>
                        <tr>
                        <tr>
    <th>Ảnh đại diện</th>
    <td>
        @if($data->hinhAnhDaiDien)
            <img src="{{ asset('storage/'.$data->hinhAnhDaiDien) }}" alt="Ảnh đại diện" width="100" />
        @endif
        <input name="hinhAnhDaiDien" type="file"/>
    </td>
</tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="btn btn-primary" value="Chấp nhận"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script>
    function toggleSoNamKetThuc() {
        var selectBox = document.getElementById("cus_id");
        var soNamKetThucInput = document.getElementById("soNamKetThucInput");

        // Nếu người dùng được chọn (id_khach_thue khác 0)
        if (selectBox.value != 0) {
            soNamKetThucInput.style.display = "block"; // Hiển thị trường nhập số năm kết thúc hợp đồng
            soNamKetThucInput.required = true; // Bắt buộc nhập số năm kết thúc hợp đồng
        } else {
            soNamKetThucInput.style.display = "none"; // Ẩn trường nhập số năm kết thúc hợp đồng
            soNamKetThucInput.required = false; // Không bắt buộc nhập số năm kết thúc hợp đồng
        }
    }
</script>
@endsection

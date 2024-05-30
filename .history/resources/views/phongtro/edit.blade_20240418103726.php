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
                                <select name="cus_id" class="form-control">
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
                                            <option @if($data->id_thanh_vien==$mem->id) selected @endif value="{{$mem->id}}">{{$mem->tenThanhVien}}-{{$ho->hoThanhVien}}</option>
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
                            <td><input value="{{$data->soNamKetThuc}}" name="soNamKetThuc" type="number" class="form-control" required/></td>
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

@endsection

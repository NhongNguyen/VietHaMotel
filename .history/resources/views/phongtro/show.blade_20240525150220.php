@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Chi tiết phòng trọ
                <a href="{{ url('admin/phongtros') }}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
            </h6>
        </div>
        <div class="card-body">
            @if($data)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Tên phòng trọ</th>
                        <td>{{ $data->tenPhong }}</td>
                    </tr>
                    <tr>
                        <th>Loại phòng</th>
                        <td>{{ $data->loaiphongs->tenLoaiPhong }}</td>
                    </tr>
                    <tr>
                        <th>Tên - Họ khách thuê</th>
                        <td>
                            @if($data->khachthues)
                                {{ $data->khachthues->tenKhach }} - {{ $data->khachthues->hoKhach }}
                            @else
                                <span style="color:red">Không có thông tin</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tên - Họ thành viên</th>
                        <td>
                            @if($data->thanhviens)
                                {{ $data->thanhviens->tenThanhVien }} - {{ $data->thanhviens->hoThanhVien }}
                            @else
                                <span style="color:red">Không có thông tin</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tình trạng</th>
                        <td>
                            @if($data->khachthues)
                                <span style="color:red">Hết phòng</span>
                            @else
                                <span style="color:green">Còn trống</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Ảnh đại diện</th>
                        <td>
                            <img src="{{ asset('storage/' . $data->hinhAnhDaiDien) }}" style="width: 100px; height: auto;">
                        </td>
                    </tr>
                    <tr>
                        <th>Danh sách ảnh</th>
                        <td>
                            @foreach($data->hinhAnhPhongTros as $image)
                                <img src="{{ asset('storage/' . $image->srcHinhAnh) }}" style="width: 50px; height: auto;">
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Mô tả</th>
                        <td>{{ $data->moTa }}</td>
                    </tr>
                </table>
            </div>
            @else
            <p>Không có dữ liệu nào tồn tại.</p>
            @endif
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

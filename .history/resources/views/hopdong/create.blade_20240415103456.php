@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm hợp đồng
                <a href="{{url('admin/hopdong')}}" class="float-right btn btn-success btn-sm">Xem tất cả</a>
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
                <form method="post" action="{{url('admin/hopdong')}}">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Chọn phòng trọ</th>
                            <td>
                                <select name="roo_id" id="roo_id" class="form-control">
                                    <option value="0">--- Chọn ---</option>
                                    @foreach($phongtros as $roo)
                                    <option value="{{$roo->id}}" data-loaiphong="{{$roo->id_loai_phong}}">{{$roo->tenPhong}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Chọn khách thuê</th>
                            <td>
                                <select name="cus_id" class="form-control">
                                    <option value="0">--- Chọn ---</option>
                                    @foreach($khachthues as $cus)
                                    <option value="{{$cus->id}}">{{$cus->hoKhach}} {{$cus->tenKhach}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>ID loại phòng</th>
                            <td><input name="id_loai_phong" id="id_loai_phong" type="text" class="form-control" readonly /></td>
                        </tr>
                        <tr>
                            <th>Ngày bắt đầu</th>
                            <td><input name="ngayBatDau" type="date" class="form-control" /></td>
                        </tr>
                        <tr>
                            <th>Ngày kết thúc</th>
                            <td><input name="ngayKetThuc" type="number" class="form-control" placeholder="Nhập số năm hết hạn hợp đồng" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="btn btn-primary" value="Chấp nhận" />
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

@section('scripts')
$(document).ready(function() {
    $('#roo_id').change(function() {
        var id_loai_phong = $(this).find(':selected').data('loaiphong');
        $('#id_loai_phong').val(id_loai_phong);
        
        // Thực hiện yêu cầu AJAX để lấy đơn giá từ id_loai_phong
        $.ajax({
            type: 'GET',
            url: '/getDonGia/' + id_loai_phong,
            success: function(response) {
                // Cập nhật giá trị của ô input hiển thị đơn giá
                $('#giaDatCoc').val(response.donGia);
            }
        });
    });
});
@endsection

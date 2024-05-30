@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Loại phòng
                <a href="{{url('admin/chitiethoadondichvu/create')}}" class="float-right btn btn-success btn-sm">Thêm mới</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tháng/Năm</th>
                            <th>Tên phòng</th>
                            <th>Dịch vụ</th>
                            <th>Số trước</th>
                            <th>Số hiện tại</th>
                            <th>Thành tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tháng/Năm</th>
                            <th>Tên phòng</th>
                            <th>Dịch vụ</th>
                            <th>Số trước</th>
                            <th>Số hiện tại</th>
                            <th>Thành tiền</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                        @foreach($chiTietHoaDonDichVus as $d)
                        <tr>
                            <td>{{ date('H:m:s d/m/Y', strtotime($d->ngayLapChiTietHoaDon)) }}</td>
                            <td>{{$d->chitiethoadons->hoadons->phongtros->tenPhong}}</td>
                            <td>{{$d->dichvus->tenDichVu}}</td>
                            <td>{{$d->soTruoc}}</td>
                            <td>{{$d->soHienTai}}</td>
                            <td>{{$d->thanhTien}}</td>
                            <td>
                                <a href="{{url('admin/chitiethoadondichvu/'.$d->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{url('admin/chitiethoadondichvu/'.$d->id).'/edit'}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Bạn đã chắc chắn xóa dữ liệu này chưa?')" href="{{url('admin/chitiethoadondichvu/'.$d->id).'/delete'}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        <tr>
                            <td colspan="5"><strong>Tổng tiền:</strong></td>
                            <td colspan="2">
                                @foreach($totalAmounts as $id => $amount)
                                    @foreach($amount as $ngayLapHoaDon => $total)
                                        {{$total}}
                                    @endforeach
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@section('scripts')
<!-- Custom styles for this page -->
<link href="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page level plugins -->
<script src="{{asset('public')}}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('public')}}/js/demo/datatables-demo.js"></script>
@endsection

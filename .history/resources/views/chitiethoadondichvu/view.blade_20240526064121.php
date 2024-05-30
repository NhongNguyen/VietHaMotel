@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách chi tiết hóa đơn dịch vụ
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
                            <th>Tổng tiền</th> 
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
                            
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($chiTietHoaDonDichVus)
                        @foreach($chiTietHoaDonDichVus as $d)
                        <tr>
                            <td>{{ date('H:m:s d/m/Y', strtotime($d->ngayLapChiTietHoaDon)) }}</td>
                            <td>{{$d->chitiethoadons->hoadons->phongtros->tenPhong}}</td>
                            <td>{{$d->dichvus->tenDichVu}}</td>
                            <td>{{$d->soTruoc}}</td>
                            <td>{{$d->soHienTai}}</td>
                            <td>{{$d->thanhTien}}</td>
                            <td>
    @if(isset($totalAmounts[$d->id_chi_tiet_hoa_don]))
        @foreach($totalAmounts[$d->id_chi_tiet_hoa_don] as $total)
            {{$total}}<br>
        @endforeach
    @endif
</td>
                        </tr>
                        @endforeach
                        @endif
        
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
